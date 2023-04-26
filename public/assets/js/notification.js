$(document).ready(function() {
  const base_url = window.location.origin;
  const user = document.getElementById("notification-bell").dataset.user;
  const notificationList = document.getElementById("notification-list");
  const notificationCount = document.getElementById("notification-count");

  newNotifications();
  setInterval(newNotifications, 30000); // 30 segundos 
 
  $("#notification-clearall").click(function(e) {
    e.preventDefault();
    const url_get = base_url + '/' + user + '/notificacoes/markallread/';
    $.ajax({
      method: 'GET',
      url: url_get,
      success: function(){
        hideElements();
      },
    });
  });

  function dismissNotification(e) {
    e.preventDefault();
    const id = $(this).attr("data-id");
    const url_get = base_url + '/' + user + '/notificacoes/markread/' + id;
    $.ajax({
      method: 'GET',
      url:  url_get,
      success: function(){
        newNotifications();
      },
    });
  }

  function hideElements(){
    notificationList.style.display = 'none';
    notificationCount.style.display = 'none';
  }

  function newNotifications() {
    const url_get = base_url + '/' + user + '/notificacoes/unread/';
    $.ajax({
      method: 'GET',
      url: url_get,
      success: function(data){
        json = JSON.parse(data)
        if(json[0].length > 0) {
          $('#notification-list').empty();
          let output = '';
          let index = 0;
          json[0].forEach(element => {
            output += `
                      <a href="#" class="dropdown-item notify-item" data-id="${element.id}">
                        <div>
                            <p class="notify-details" style="margin-left:0px;margin-right:30px;"><b>${element.data['title']}</b><br>${element.data['description']}
                                <small class="text-muted">${json[1][index]}</small>
                            </p>
                        </div>
                      </a>
                      `;
            index += 1;          
          });
          notificationList.style.display = 'block';
          notificationCount.style.display = 'inline-block';
          notificationCount.innerHTML = json[0].length;
          notificationList.innerHTML = output;
        } else
          hideElements();

        $("#notification-list a").click(dismissNotification);
      },
    });
} 

});