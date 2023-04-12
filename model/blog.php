<?php
namespace php_blog\model;

class Blog{

    protected $oDb;

    public function __construct(){
        $this->oDb = new \php_blog\engine\Db;
    }

    public function get($iOffset,$iLimit) {
        $oStmt = $this->oDb->prepare('SELECT * FROM Posts ORDER BY createdDate DESC LIMIT :offset, :limit');
        $oStmt->bindParam(':offset',$iOffset,\PDO::PARAM_INT);
        $oStmt->bindParam(':limit',$iLimit,\PDO::PARAM_INT);
        $oStmt->execute();

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAll(){
        $oStmt = $this->oDb->query('SELECT * FROM Posts ORDER BY createdDate DESC');

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function add(array $aData){
        $oStmt = $this->oDb->prepare('INSERT INTO Posts (title,body,createdDate) VALUES(:title,:body,:created_date)');

        return $oStmt->execute($aData);
    }

    public function getbyId($iId){
        $oStmt = $this->oDb->prepare('SELECT * FROM Posts WHERE id = :postid LIMIT 1');
        $oStmt->bindParam(':postid',$iId,\PDO::PARAM_INT);
        $oStmt->execute();

        return $oStmt->fetch(\PDO::FETCH_OBJ);
    }

    public function update(array $aData){
        $oStmt = $this->oDb->prepare('UPDATE Posts SET title = :title, body = :body WHERE id = :postid LIMIT 1');
        $oStmt->bindValue(':title',$aData['title']);
        $oStmt->bindValue(':body',$aData['body']);
        $oStmt->bindValue(':postid',$aData['post_id'],\PDO::PARAM_INT);

        return $oStmt->execute();
    }

    public function delete($iId){
        $oStmt = $this->oDb->prepare('DELETE FROM posts WHERE id = :postid LIMIT 1');
        $oStmt->bindParam(':postid',$iId,\PDO::PARAM_INT);

        return $oStmt->execute();
    }

}

?>