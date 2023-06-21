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
        $oStmt = $this->oDb->prepare('INSERT INTO Posts (title,body,image,author,createdDate) VALUES(:title,:body,:image,:author,:created_date)');

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

    public function comment(array $aData){
        $oStmt = $this->oDb->prepare('INSERT INTO comments (post_id, name, comment) VALUES(:post_id,:name,:comment)');

        
        return $oStmt->execute($aData);
    }


 
    public function commentbyId($iId){
        $oStmt = $this->oDb->prepare('SELECT * FROM comments WHERE post_id = :post_id LIMIT 5');
        $oStmt->bindParam(':post_id',$iId,\PDO::PARAM_INT);
        $oStmt->execute();

        return $oStmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function delete($iId){
        $oStmt = $this->oDb->prepare('DELETE FROM posts WHERE id = :postid LIMIT 1');
        $oStmt->bindParam(':postid',$iId,\PDO::PARAM_INT);

        return $oStmt->execute();
    }


    //function that registers users email for newsletter 

    public function registerNewsletter(array $aData){
        $oStmt = $this->oDb->prepare('INSERT INTO newsletter (email) VALUE(:email)');

        return $oStmt->execute($aData);
    }

}

?>
