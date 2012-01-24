	function clearText(obj, value) {
		if(obj.value==value)
			obj.value="";
	}

	function sendMessage() {
		var user=document.getElementsByName('user')[0];
		var message=document.getElementsByName('message')[0];
		if((message.value=='Message') || (user.value=='Username') || user.value=='' || message.value=='') {
			alert('Заполните имя/сообщение!');
			return 0;
		}

		var xmlhttp = getXmlHttp();
		xmlhttp.open('POST', ROOT_PATH + 'chatajax/message.json', true);
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


		xmlhttp.onreadystatechange =
			function() {
				if (xmlhttp.readyState == 4) {
					if(xmlhttp.status == 200) {
						var response = eval('(' + xmlhttp.responseText + ')');
						if(response.status!=1) alert("Something wrong!");
						updateChat();
					}
				}
			};


		var post_data="user="+encodeURIComponent(user.value)+"&message="+encodeURIComponent(message.value);

		xmlhttp.send(post_data);
		message.value="";
	}

	function updateChat() {
		var xmlhttp = getXmlHttp()
		xmlhttp.open('GET', ROOT_PATH + 'chatajax/last.json?id='+lastMessage, true);
		xmlhttp.onreadystatechange =
			function() {
				if (xmlhttp.readyState == 4) {
					if(xmlhttp.status == 200) {
						var messages = eval('(' + xmlhttp.responseText + ')');
						if(messages.length==0) return;
						var messagesPlace=document.getElementById('messages');

						for (var i in messages) {
							messagesPlace.innerHTML+='<tr><td>'
								+messages[i].user+'</td><td>'
								+messages[i].message+'</td></tr>';
						}
						
						lastMessage=messages[i].id;
					}
				}
			}

		xmlhttp.send(null);
	}

	function getXmlHttp(){
		var xmlhttp;
		try {
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (E) {
				xmlhttp = false;
			}
		}
		if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
			xmlhttp = new XMLHttpRequest();
		}
		return xmlhttp;
	}
