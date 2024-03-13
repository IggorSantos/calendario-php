<?php
namespace Classes;

use Models\ModelConnect;

class ClassEvents extends ModelConnect{
    public function getEvents() {
        $res = $this->connectDB()->query("SELECT * FROM events")->fetchAll(\PDO::FETCH_ASSOC);  
        return json_encode($res);
    }
    
    public function createEvent($title, $color = 'red', $start, $end) {
        try{
            $this->connectDB()->query("INSERT INTO events (title,color,start,end) VALUES ('$title', '$color', '$start', '$end')");  
            return 200;
        } catch (\PDOException $error) {
            $error->getMessage();            
        }      
        

    }
    
    public function getEventsById($id) {
        $res = $this->connectDB()->query("SELECT * FROM events WHERE id = '$id'")->fetch(\PDO::FETCH_ASSOC);
        return $res;
    }
    
    public function updateEvents($id,$title,$color,$start) {
        try {
            $this->connectDB()->query("UPDATE events SET title = '$title', color = '$color', start = '$start' WHERE id = '$id'"); 
            return 200;            
        } catch (\PDOException $error) {
            $error->getMessage();            
        }
    
    }
    
    public function deleteEvents($id) { 
        try{
            $this->connectDB()->query("DELETE FROM events WHERE id = '$id'"); 
            return 200;
        } catch (\PDOException $error) {
            $error->getMessage();
        }               
    }
    
    public function updateDropEvent($id,$start,$end) {
        $this->connectDB()->query("UPDATE events SET start = '$start',end = '$end' WHERE id = '$id'");        
    }
}

