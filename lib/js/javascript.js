(function(win,doc){
    'use strict';
    
    if(doc.getElementById('#delete')){
        let btn = doc.querySelector('#delete');
        btn.addEventListener('click', (event)=>{
            event.preventDefault();
            if(confirm("Deseja mesmo apagar este dado?")){
                win.location.href = event.target.parentNode.href;
            }
        },false);
    } 
    
        document.addEventListener('DOMContentLoaded', function() {
              let calendarEl = document.getElementById('calendar');
              let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',                
                locale:'pt-br',
                buttonText:{
                    today: 'Hoje'
                },
                  dateClick: function(info) {
                    if(info.view.type === 'dayGridMonth'){
                        calendar.changeView('timeGrid', info.dateStr);
                    }else{
                        window.location.href = '/agenda-calendar/views/user/add.php?date='+info.dateStr;                                             
                        //document.getElementById("modal").innerHTML = modalAddTask(info);
                    } 
              },
              droppable: true,
              editable: true,
              //selectable: true,            
              eventDrop: function(info){
                  resizeAndDrop(info);
              },
              eventResize: function(info){
                  resizeAndDrop(info);
              },
              /*select: async(arg)=> {
                  let title = prompt('Nome do Evento:');
                  if(title){
                      let response = await fetch('http://localhost/agenda-calendar/controllers/ControllerSelectable.php', {
                          method:'post',
                          headers:{
                              'Content-Type':'application/json',
                              'Accept':'application/json'
                          },
                          body:JSON.stringify({
                              title:title,
                              start:arg.start,
                              end:arg.end
                          })
                      });
                      if(response.status === 200){
                         window.location.reload();
                      }
                  }
              },*/
              events: '/agenda-calendar/controllers/ControllerEvents.php',
              eventClick: function(info){
                  //window.location.href=`https://sitequalquer.com.br/evento/${info.event.id}`;
                  window.location.href = `/agenda-calendar/views/user/editar.php?id=${info.event.id}`;
              }            
              });
              calendar.render();
              function modalAddTask(info){
                let modal = `<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      ...
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                            </div>` ; 
                return modal;  
                }
              async function resizeAndDrop(info){
                  let newDate = new Date(info.event.start);
                  let month = ((newDate.getMonth()+1)<9)?"0"+(newDate.getMonth()+1):newDate.getMonth()+1;
                  let day = ((newDate.getDate())<9)?"0"+ newDate.getDate():newDate.getDate();
                  let minutes = ((newDate.getMinutes())<9)?"0"+ newDate.getMinutes():newDate.getMinutes();
                  newDate = `${newDate.getFullYear()}-${month}-${day} ${newDate.getHours()}:${minutes}:00`;
                  //console.log(newDate);
                  
                  let newDateEnd = new Date(info.event.end);
                  let monthEnd = ((newDateEnd.getMonth()+1)<9)?"0"+(newDateEnd.getMonth()+1):newDateEnd.getMonth()+1;
                  let dayEnd = ((newDateEnd.getDate())<9)?"0"+ newDateEnd.getDate():newDateEnd.getDate();
                  let minutesEnd = ((newDateEnd.getMinutes())<9)?"0"+ newDateEnd.getMinutes():newDateEnd.getMinutes();
                  newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} ${newDateEnd.getHours()}:${minutesEnd}:00`;
                  //console.log(newDateEnd);
                  
                  let reqs = await fetch('http://localhost/agenda-calendar/controllers/ControllerDrop.php',{
                  method: 'post',
                  headers:{
                      'Content-Type': 'application/x-www-form-urlencoded'
                  },
                  body: `id=${info.event.id}&start=${newDate}&end=${newDateEnd}`                                  
                  });
                  let res = await reqs.json();
                  console.log(res);
            }
        });
    
})(window,document);



