<?php include("../../config/config.php"); ?> 
<?php include(DIRREQ."agenda-calendar/lib/html/header.php");?> 
<?php $objEvents = new \Classes\ClassEvents();
    $events = $objEvents->getEventsById($_GET['id']); 
    $date = new \DateTime($events['start']);
?> 

<!--<a id="delete" href="<?php echo DIRPAGE.'agenda-calendar/controllers/ControllerDelete.php?id='.$_GET['id']; ?>"><button>Deletar</button></a>
<form name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE.'agenda-calendar/controllers/ControllerEdit.php';?>">
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><br>
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"><br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>"><br>
    Paciente: <input type="text" name="title" id="title" value="<?php echo $events['title']; ?>"><br>    
    Queixa: <input type="text" name="description" id="description" value="<?php echo $events['description']; ?>"><br>  
    <input type="submit" value="Confirmar Consulta">    
</form>-->


<link rel="stylesheet" href="editar.css"/>
<div class="container mt-3">
    <div class="d-flex justify-content-center align-items-center flex-column">
   <!--<img class="user-img" src="../../img/user.png" alt="alt"/> -->
        <a href="/agenda-calendar" class="mt-3 mb-3 btn btn-primary">Voltar</a>
        <i class="bi bi-list-task"></i>
   <p>Editar Tarefa</p>
</div>


 <form class="formEdit" name="formEdit" id="formEdit" method="post" action="<?php echo DIRPAGE.'agenda-calendar/controllers/ControllerEdit.php'; ?>">
     <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"><br>
     <div class="form-group">
         <label for="date">Data</label>
         <input class="form-control" type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>">               
     </div>
      <div class="form-group">
         <label for="date">Hora</label>
         <input class="form-control" type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>">               
     </div>
    <div class="form-group">
      <label for="title">Atividade</label>
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $events['title']; ?>">
    </div>

        
    <div class="form-group">
        <label for="color">Escolha o nível de prioridade</label>
        <select class="form-control" id="color" name="color">
            <option value="blue" style="background-color: blue; color: black">Fácil</option>
          <option value="yellow" style="background-color: yellow; color: black">Médio</option>
          <option value="red" style="background-color: red">Urgente</option>
        </select>
    </div>
     
     <div class="d-flex justify-content-evenly">
         <button type="submit" type="button" class="mt-3 btn btn-success"><i class="bi bi-pencil-square"></i>Atualizar</button>      
         <a id="delete" class="mt-3 btn btn-danger" href="<?php echo DIRPAGE.'agenda-calendar/controllers/ControllerDelete.php?id='.$_GET['id']; ?>"><i class="bi bi-trash3-fill"></i>Deletar</a>
     </div>
      
</form>    
</div>



<?php include(DIRREQ."agenda-calendar/lib/html/footer.php");?>
