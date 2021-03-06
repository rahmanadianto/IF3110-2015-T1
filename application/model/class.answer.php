<?php 
	class Answer {
		public $id;
		public $thread_id;
		public $author;
		public $email;
		public $content;
		public $n_vote;
		public $date;

		public function __construct($id, $thread_id, $author, $email, $content, $n_vote, $date) {
			$this->id = $id;
			$this->thread_id = $thread_id;
			$this->author = $author;
			$this->email = $email;
			$this->content = $content;
			$this->n_vote = $n_vote;
			$this->date = $date;
		}

		public static function answerFor($threadId) {
			$list = [];
			$db = Connection::getInstance();
			$req = $db->query('SELECT * FROM sse_answer WHERE thread_id=' . $threadId . ' ORDER BY n_vote DESC');

			foreach($req->fetchAll() as $answer) {
				$list[] = new Answer($answer['answer_id'], $threadId, $answer['user_name'], $answer['user_email'], $answer['answer_content'], $answer['n_vote'], $answer['answer_date']);
			}

			return $list;
		}

		public static function upvote($id) {
			$db = Connection::getInstance();
			$sql = "UPDATE sse_answer
							SET n_vote = n_vote + 1
							WHERE answer_id=?";

			$statement = $db->prepare($sql);
			$statement->execute(array($id));
		}

		public static function downvote($id) {
			$db = Connection::getInstance();
			$sql = "UPDATE sse_answer
							SET n_vote = n_vote - 1
							WHERE answer_id=?";

			$statement = $db->prepare($sql);
			$statement->execute(array($id));
		}

		public static function post($username, $email, $content, $threadId) {
			$dates = date("Y-m-d H:i:s");
			$db = Connection::getInstance();
			$sql = "INSERT INTO sse_answer (user_name,user_email,answer_content,answer_date,thread_id) 
							VALUES (:username,:email,:content,:dates,:threadId)";

			$statement = $db->prepare($sql);
			$statement->execute(array(':username' => $username,
                  			':email' => $email,
                  			':content' => $content,
                  			':dates' => $dates,
                  			':threadId' => $threadId));
		}
		
		public static function delete($id) {
			$db = Connection::getInstance();
			$sql = "DELETE FROM sse_answer WHERE thread_id = :id";
			$statement = $db->prepare($sql);
			$statement->execute(array(':id' => $id));
		}
	}
?>
