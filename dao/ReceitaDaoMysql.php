<?php 

	require_once 'models/Receita.php';

	class ReceitaDaoMysql implements ReceitaDao{

		private $pdo;

		public function __construct(PDO $driver){
			$this->pdo = $driver;
		}

		private function generateUser($array, $full = false){
			$r = new Receita();
			$r->id = $array['id'] ?? 0;
			$r->email = $array['email'] ?? '';
			$r->password = $array['password'] ?? '';
			$r->name = $array['name'] ?? '';
			$r->birthdate = $array['birthdate'] ?? '';
			$r->city = $array['city'] ?? '';
			$r->work = $array['work'] ?? '';
			$r->avatar = $array['avatar'] ?? '';
			$r->cover = $array['cover'] ?? '';
			$r->token = $array['token'] ?? '';

			return $u;

		}

		public function insert(Receita $r){

			$sql = $this->pdo->prepare("INSERT INTO receita(data, doc, ndoc, categoria,cliente, valor, obs)
				VALUES(:data, :doc, :ndoc, :categoria, :cliente, :valor, :obs)
				");

			$sql->bindValue(':data', $r->data);
			$sql->bindValue(':doc', $r->doc);
			$sql->bindValue(':ndoc', $r->ndoc);
			$sql->bindValue(':categoria', $r->categoria);
			$sql->bindValue(':cliente', $r->cliente);
			$sql->bindValue(':valor', $r->valor);
			$sql->bindValue(':obs', $r->obs);
			$sql->execute();

			return true;
		}

		public function update(Receita $r){
			$sql = $this->pdo->prepare("UPDATE receita  SET data = :data, 
			doc = :doc, 
			ndoc = :ndoc,
			categoria = :categoria,
			cliente = :cliente,
			valor = :valor,
			obs = :obs WHERE id = :id");
			

			$sql->bindValue(':data', $data);
			$sql->bindValue(':doc', $doc);
			$sql->bindValue(':ndoc', $ndoc);
			$sql->bindValue(':categoria', $categoria);
			$sql->bindValue(':cliente', $cliente);
			$sql->bindValue(':valor', $valor);
			$sql->bindValue(':obs', $obs);
			$sql->bindValue(':id', $id);
			$sql->execute();

			return true;

		}

		public function findByName($cliente){
			$array = [];

			if (!empty($cliente)) {
				$sql = $this->pdo->prepare("SELECT * FROM receita  WHERE cliente LIKE :cliente");
				$sql->bindValue(':cliente','%'. $cliente . '%');
				$sql->execute();

				//verificando se achou algo do token
				if ($sql->rowCount() > 0) {
					$data = $sql->fetchAll(PDO::FETCH_ASSOC);

					//preenchendo a lista de usuarios
					foreach ($data as $item) {
						 $array[] = $this->generateUser($item);
					}
								}
			}

			return $array;


		}



	}
 ?>