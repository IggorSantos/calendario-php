<?php include("../../config/config.php"); ?> 
<?php include(DIRREQ."agenda-calendar/lib/html/header.php");?> 
<?php $date = new \DateTime($_GET['date'],new \DateTimeZone('America/Sao_Paulo'));?> 

<!--<form name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'agenda-calendar/controllers/ControllerAdd.php';?>">
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"><br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>"><br>
    Paciente: <input type="text" name="title" id="title"><br>    
    Queixa: <input type="text" name="description" id="description"><br>  
    Quanto tempo deseja de atendimento: <select name="horasAtendimento" id="horasAtendimento">
        <option value="">Selecione</option>
        <option value="1">1h</option>
        <option value="2">2h</option>
        <option value="3">3h</option>
    </select><br> 
    <input type="submit" value="Marcar Consulta">    
</form>-->

<link rel="stylesheet" href="add.css"/>
<div class="container">
    <div class="d-flex justify-content-center align-items-center flex-column">
   <!--<img class="user-img" src="../../img/user.png" alt="alt"/> -->
   <a href="/agenda-calendar" class="mt-3 mb-3 btn btn-primary">Voltar</a>
   <i class="bi bi-list-task"></i>
   <p>Cadastrar Nova Tarefa</p>   
</div>


 <form class="form" name="formAdd" id="formAdd" method="post" action="<?php echo DIRPAGE.'agenda-calendar/controllers/ControllerAdd.php';?>">
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
      <input type="text" class="form-control" id="title" name="title">
    </div>

       
    <div class="form-group">
        <label for="color">Escolha o nível de prioridade</label>
        <select class="form-control" id="color" name="color">
            <option value="blue" style="background-color: blue; color: black">Fácil</option>
          <option value="yellow" style="background-color: yellow; color: black">Médio</option>
          <option value="red" style="background-color: red">Urgente</option>
        </select>
    </div>
     
     <div class="d-flex justify-content-center">
         <button type="submit" type="button" class="mt-3 btn btn-success"><i class="bi bi-plus-circle-fill"></i>Cadastrar</button>         
     </div>
      
</form>    
</div>

<?php include(DIRREQ."agenda-calendar/lib/html/footer.php");?>


