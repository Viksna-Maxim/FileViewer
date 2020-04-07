<?php
    include_once 'php/dbconfig.php';
    include_once "php/session.php";
?>
<!DOCTYPE html>
<html class="full-height-html">
    <head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>LilWeb Viewer</title>

        <link href="style/style.css" rel="stylesheet">
        <link href="style/btnanimations.css" rel="stylesheet">

				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    </head>
    <body class="full-height-body">

			<video autoplay muted loop id="myVideo" class="position-relative-overlay">
          <source src="content/Design_Student_Sketching_Creating_Chapters.mp4" type="video/mp4">
           Your browser does not support HTML5 video.
      </video>

      <div class="position-absolute-overlay">
          <div class="button-group">

              <div id="box1">
	               <a class="button-2" href="#popup2" id="button-2-e">Вход</a>
              </div>

              <button id="login-block-style"></button>
          </div>

          <div id="myModalw" class="modalw">
              <!-- Modal content -->
              <div class="modal-contentw" id="myModalw_2">
                  <span class="close">&times;</span>
                  <div class="crt-prj">
                      <button id="create_project">Создать проект</button>
                  </div>
                  <div id="registeration_user">
                      <button id="new-user-btn">Новый пользователь</button>
                  </div>
                  <div class="loge-out-class">
                      <button id="loge_out" onclick="loge_out_fnc();">Выйти</button>
                  </div>
              </div>

          </div>

          <div id="popup1" class="overlay">
              <div class="popup">
                  <form name="register" method="post" id="register">
                      <h2 class="registration-style-class-h2">Регестрация пользователя</h2>
                      <h3 class="registration-style-class-h2-1">Введите логин</h3>
                      <input class="enter-input-login-style" type="text" placeholder="Ваш логин" name="login" required>
                      <h3 class="registration-style-class-h2-2">Введите пароль</h3>
                      <input class="enter-input-password-style" type="password" placeholder="Ваш пороль" name="psw" required>
                      <h3 class="registration-style-class-h3-3">Введите повторно пароль</h3>
                      <input class="enter-input-password-style" type="password" name="psw-repeat">
                      <input type="submit" value="Регестрация" id="enter"/></br>
                      <a class="close" href="#">&times;</a>
                  </form>
                  <div id="register-success">
                      <h3>Регистрация прошла успешно!</h3>
                      <a class="close" href="#">&times;</a>
                  </div>
              </div>
          </div>

          <div id="popup2" class="overlay">
              <div class="popup">
                  <form name="enter-form" method="post" id="enter-form">
                      <h2>Вход</h2>
                      <h3>Введите логин</h3>
                      <input class="enter-input-login-style" id="enter_input_login_style"type="text" placeholder="Ваш логин" name="elogin" required>
                      <h3>Введите пароль</h3>
                      <input class="enter-input-password-style" id="enter_input_password_style" type="password" placeholder="Ваш пороль" name="epsw" required>
                      <input type="submit" value="Вход" id="enter-2"/></br>
                      <a class="close" href="#">&times;</a>
                  </form>
                  <div id="enter-success">
                      <h3>Вход успешен!</h3>
                      <a class="close" href="#">&times;</a>
                  </div>
              </div>
          </div>

          <div class="all-style">

				      <div class="filter-style">
                  <div class="filter-block">
                      <div class="filter-block-1">
                          <span class="filter-text-1">Тег</span>
                          <input type="text" name="" value="" id="filter-teg-btn" placeholder="Example: js,php,c"/>
                      </div>
                      <div class="filter-block-2">
                          <span class="filter-text-2">Создан с</span>
                          <input type="date" max="2100-04-20" min="2000-01-1" value="2012-04-15" class="date-class-style" id="date_before"/>
                          <span class="filter-text-3">Создан по</span>
                          <input type="date" max="2100-04-20" min="2012-04-10" value="2012-04-15" class="date-class-style" id="date_after"/>
                      </div>
                      <div class="filter-block-3">
                          <button type="button" name="button" id="filter-btn-reset">Сбросить</button>
                          <button type="button" name="button" id="filter-btn">Применить</button>
                      </div>
                  </div>
              </div>

              <div class="search-style">
        	        <form name="f1" method="post" class="search-style-form" id="f1">
                      <input class="search-style-input-string" type="search" name="search_q" id="search_q"/></br>
                      <input type="submit" value="Поиск" id="btn"/></br>
                  </form>

					    		<script>
					    				$("input#search_q").focus();
					    		</script>

		              <div id="result_form"></div>

				        </div>
          </div>

        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modalmy" id="modalmy_id" role="document">
                <div class="modal-content modal-content-my">
                    <div class="modal-header">
                        <div class="sub_header_modal">
                            <a id="project_name"></a>
                        </div>
                        <div class="modal-header-block1">
                            <div class="static-option-prj-modal">
                                <div id="option_prj_modal">
                                    <button id="btn_delete_project">Удалить</button>
                                    <button id="btn_rename_project">Переименовать</button>
                                    <button id="btn_info_project">Статистика</button>
                                    <a class='fas fa-cloud-download-alt href_class' id="btn_download_project"></a>
                                </div>
                            </div>
                            <div class="modal-header-block2">
                                <i class='fas fa-angle-down' id="project_option" onclick="project_option_popup();"></i>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="modalbody">
                        <div class="nav-path-class">
                            <button id="btn_back"><i class='fas fa-arrow-left'></i></button>
                            <button id="btn_ahead"><i class='fas fa-arrow-right'></i></button>
                            <div id="nav_path"></div>
                        </div>
                        <div class="modal-body-row">
                            <div id="open_content"></div>
                            <div class="info-class-my">
                                <div class="block-lr-1"></div>
                                <div class="middle_block">
                                    <div id="add_logo"></div>
                                    <div class="author-inline">
                                        <span class="author-class">Автор: </span>
                                        <span id="add_author"></span>
                                        <button id="add_coauthor" onclick="add_coauthor_func();"><i class='fas fa-user-plus'></i></button>
                                        <button id="list_coauthor"><i class='fas fa-user-friends'></i></button>
                                    </div>
                                    <hr class="hr-modal-class">
                                    <div class="creation-date-class">
                                        <span class="creation-date-class-2">Проект создан:</span>
                                        <span id="add_creation_date"></span>
                                    </div>
                                    <hr class="hr-modal-class">
                                    <div class="addtag_in_modal_class">
                                        <input name="addtag" id="addtag_in_modal"/>
                                        <button id="addtagbtn_in_modal" onclick="addtag_in_modal_func();"><i class='fas fa-plus'></i></button>
                                    </div>
                                    <div id="insert_teg"></div>
                                </div>
                                <div class="block-lr-2">
                                    <div id="list_coauthor_block">
                                        <h2 class="coauthor_block10">Соавторы:</h2>
                                        <div id="output_list_coauthors">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="modalfooter">
                        <input type="file" name="choos_file" id="choos_file"/>
                        <button id="btn_choose_modal" onclick="lieclick()">Выбрать</button>
                        <button id="btn_upload_modal">Загрузить</button>
                        <button id="btn_delete_modal">Удалить</button>
                        <button id="btn_removee_modal">Переместить</button>
                        <button id="btn_rename_modal">Переименовать</button>
                    </div>
                    <div id="viewfilemodal">
                        <button id=exit_fileview><i class='fas fa-arrow-left'></i></button>
                        <xmp id="main"></xmp>
                    </div>
                </div>
            </div>
        </div>

        <div id="tree">
            <div class="header-tree">
                <div class="header-tree-1"><h2 class="header-tree-text-1">Перемещение</h2></div>
                <div class="header-tree-2"><i class="material-icons" id="header-tree-text-2" onclick="close_tree_modal();">close</i></div>
            </div>
            <div id="body-tree">
                <input type="text" id="remove_id_input" placeholder="project_name/folder"/>
            </div>
            <div class="footer-tree">
                <button type="button" id="clear_tree_btn">Отменить</button>
                <button type="button" id="clear_tree_btn_tranfer">Переместить</button>
            </div>
        </div>

        <div id="rename_project_modal">
            <div class="rename-project-modal-header">
                <div class="rename-project-modal-header-block-1">
                    <h2 class="rename-project-modal-header-text-1">Переименовать</h2>
                    <h2 id="rename_project_modal_header_text_2" ></h2>
                </div>
                <div class="rename-project-modal-header-block-2">
                    <i class="material-icons" id="rename_project_modal_close">close</i>
                </div>
            </div>
            <div class="rename-project-modal-body">
                <input type="text" id="rename_project_input" placeholder="New project name is here">
            </div>
            <div class="rename-project-modal-footer">
                <button type="button" id="rename_project_btn_cancle">Отменить</button>
                <button type="button" id="rename_project_btn">Переименовать</button>
            </div>
        </div>

        <div id="rename_modal">
            <div class="rename-modal-header">
                <div class="rename-modal-header-block1">
                    <h2 class="rename-modal-header-h2">Переименовать</h2>
                    <h2 id="rename_modal_header_h4"></h2>
                </div>
                <div class="rename-modal-header-block2">
                    <i class="material-icons" id="rename-modal-header-close" onclick="close_rename_modal();">close</i>
                </div>
            </div>
            <div class="rename-modal-body">
                <input type="text" id="rename_input" placeholder="rename file is here">
            </div>
            <div class="rename-modal-footer">
                <button type="button" name="button" id="rename_modal_cansle_btn">Отменить</button>
                <button type="button" name="button" id="rename_modal_rename_btn">Переименовать</button>
            </div>
        </div>

        <div id="add_coauthor_block_overlay">
            <div id="add_coauthor_block">
                <div class="header-coauthor">
                    <div class="header-coauthor-block-1">
                        <h2 class="header-coauthor-block-1-text">Добавление соавтора</h2>
                        <hr>
                    </div>
                    <div class="header-coauthor-block-2">
                        <i class="material-icons" id="close_add_coauthor_block">close</i>
                    </div>
                </div>
                <div class="body-coauthor">
                    <div class="search-coauthor-class">
                        <input type="text" id="search_coauthor" name="search_coauthor"/>
                        <button id="search_coauthor_btn">Поиск</button>
                    </div>
                    <div id="search_result_coauthor">

                    </div>
                </div>
                <div class="footer-coauthor">

                </div>
            </div>
        </div>

        <div id="modal_create_project_overlay">
            <div id="modal_create_project">
                <div class="block-group-1">
                    <h3 class="modal-header">Созданеи проекта</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn_close_2">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h3 class="project-name-class">Название проекта:</h3>
                <input name="projectname" id="projectname"/></br>
                <div class="block-group-1 block-margin">
                    <h3 class="project-tag-class">Тип:</h3>
                    <h3 class="project-logo-class">Логотип:</h3>
                </div>
                <div class="block-group-1">
                    <div class="addtagclass">
                        <input name="addtag" id="addtag"/></br>
                        <button id="addtagbtn"><i class='fas fa-plus'></i></button>
                    </div>
                    <div>
                        <input type="file" name="fg" id="fg" accept="image/*,image/jpeg,image/png"/>
                        <input type="button" onclick="lieclick_2()" class="logobtn1" value="Select"/>
                    </div>
                </div>
                <div>
                    <div id="tagresult"></div>
                </div>
                <button id="create" type="submit">Создать</button>
            </div>
        </div>

        <div id="modal_reupload_logo_overlay">
             <div id="modal_reupload_logo">
                 <div class="mrlheader">
                     <div class="mrl-block-1"><h2 id="mrlh2">Загрузка нового логотипа</h2></div>
                     <div class="mrl-block-2"><i class="material-icons" id="close_mrl" onclick="close_mrl_fnc();">close</i></div>
                 </div>
                 <div id="mrl-block-3">
                     <input type="file" name="input_mrl" id="input_mrl">
                     <button id="mrl_choose" onclick="click_fnc_1();">Выбирите логотип</button>
                     <button id="mrl_upload" onclick="reupload_logo();">Загрузить</button>
                     <svg id="svg1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="94" height="94" viewBox="0 0 47 47">
                        <circle fill="#4CAF50" cx="24" cy="24" r="23"/>
                        <path class="path" fill= "none" stroke ="#CCFF90" stroke-width ="1.5" stroke-dasharray= "70.2" stroke-dashoffset="70.2" d="M 34.6 14.6  L 21 28.2 L 15.4 22.6 L 12.6 25.4 L 21 33.8 L 37.4 17.4z">
		                        <animate id="p1" attributeName="stroke-dashoffset" begin="svg1.click" values="70.2;0" dur=".5s" repeatCount="1" fill="freeze" calcMode="paced" restart="whenNotActive"/>
		                        <animate id="ff1" attributeName="fill" begin = "p1.end" values="#4CAF50; #CCFF90"  dur=".3s" fill="freeze" restart="whenNotActive" />
                        </path>
                     </svg>
                 </div>
                 <div></div>
             </div>
        </div>

        <script>
            var navpath = "";
            var navpathlenght = 0;
            var typestring = "";
            var typestringteg = "";
            var author = "<?php echo $_SESSION['login'];?>";
            var on_off_option = 1;
            var mode = "";
            var current_path = "";
            var global_project_name = "";
            var file_name_old = "";

            if(author != "guest") {
                document.getElementById("enter-form").style["display"] = "none";
                document.getElementById("enter-success").style["display"] = "block";
                document.getElementById("box1").style["display"] = "none";
                document.getElementById("box1").style["display"] = "none";
                document.getElementById("login-block-style").style["display"] = "flex";
                document.getElementById("login-block-style").style["width"] = "10%";
                document.getElementById("login-block-style").style["justify-content"] = "center";
                document.getElementById("login-block-style").style["height"] = "3em !important";
                document.getElementById("login-block-style").style["padding"] = "0";
                document.getElementById("login-block-style").style["margin"] = "0";
                document.getElementById("login-block-style").innerHTML = author;
            } else {
                document.getElementById("box1").style["display"] = "block";
            }

            function lieclick () {
                document.getElementById('choos_file').click();
            }

            function lieclick_2 () {
                document.getElementById('fg').click();
            }

            function eventFire(el, etype){
              if (el.fireEvent) {
                  el.fireEvent('on' + etype);
              } else {
                  var evObj = document.createEvent('Events');
                  evObj.initEvent(etype, true, false);
                  el.dispatchEvent(evObj);
              }
            }

            function close_mrl_fnc () {
                document.getElementById('modal_reupload_logo').style.display = 'none';
                document.getElementById('modal_reupload_logo_overlay').style.display = 'none';
                document.getElementById('mrlh2').style.display = 'none';
                document.getElementById('mrl_choose').style.display = 'none';
                document.getElementById('mrl_upload').style.display = 'none';
                document.getElementById('modal_reupload_logo').classList.remove('add-anim-modal');
            }

            function upload_logo_again () {

                document.getElementById('modal_reupload_logo').style.display = 'block';
                document.getElementById('modal_reupload_logo_overlay').style.display = 'flex';
                document.getElementById('mrlh2').style.display = 'block';
                document.getElementById('mrl_choose').style.display = 'block';
                document.getElementById('mrl_upload').style.display = 'block';

                document.getElementById('modal_reupload_logo').classList.add('add-anim-modal');

                document.getElementById('modal_reupload_logo').style.width = '50%';
                document.getElementById('modal_reupload_logo').style.height = '9em';
                //close_mrl_fnc();
            }

            function click_fnc_1 () {
               document.getElementById('input_mrl').click();
            }

            function reupload_logo () {

                var xhr_3 = new XMLHttpRequest();
                xhr_3.open('POST', 'php/reupload.php', false);

                var form_3 = new FormData();

                form_3.append("project_name", document.getElementById('project_name').innerHTML);
                form_3.append("logo", document.getElementById('input_mrl').files[0]);

                xhr_3.send(form_3);

                if (xhr_3.status != 200) {
                    // обработать ошибку
                    alert( xhr_3.status + ': ' + xhr_3.statusText ); // пример вывода: 404: Not Found
                } else {
                    if (xhr_3.responseText != "invalid_user") {

                        eventFire(document.getElementById('svg1'), 'click');

                        setTimeout(function() {
                            close_mrl_fnc();
                            document.getElementById('svg1').style.display = 'none';
                            document.getElementById('p1').style.display = 'none';
                            document.getElementById('ff1').style.display = 'none';
                            document.getElementById('mrl-block-3').style['margin-top'] = '5%';
                        }, 1000);
                    } else {
                        alert("Вы сможете изменять логотип проекта, если станете соавтором");
                        document.getElementById('mrl_choose').style.display = 'none';
                        document.getElementById('mrl_upload').style.display = 'none';
                        document.getElementById('mrl-block-3').style['margin-top'] = '0';
                    }
                }
            }

            function folder_list (folder_name_js) {

              //  alert(folder_name_js);
                current_path = folder_name_js;

                $.ajax({
                    type: 'POST',
                    url: 'php/navigationpath.php',
                    data: 'path='+folder_name_js,
                    success: function(data){
                        //alert(data); Навигация по папкам
                        var index = navpath.indexOf(data);
                         // Добавляем
                        if (index == -1) {
                            navpath = navpath + ' / ' + data;
                        } else {// Убираем
                            navpath = navpath.slice(0,index + data.length);
                        }

                        document.getElementById("nav_path").innerHTML = navpath;
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'viewdir.php',
                    data: 'name=' + folder_name_js,
                    success: function(data){
                        //alert(project_name);
                        document.getElementById("open_content").innerHTML = data;
                    }
                });
            }

            function delete_str (str1,index) {
                var rstr = "";

                for(var i = 0; i < str1.length + index; i++) {
                    rstr[i] = str1[i];
                }

                return rstr;
            }

            function display_project_name (project_name_js) {
                document.getElementById("project_name").innerHTML = project_name_js;
            }

            function project_option_popup () {
                if (on_off_option) {
                    document.getElementById('project_option').style['transform'] = "rotate(90deg)";
                    document.getElementById('option_prj_modal').style.display = "flex";
                    document.getElementById('option_prj_modal').style['animation'] = "opacity_anim .5s";
                    document.getElementById('option_prj_modal').style['opacity'] = 1;
                } else {
                    document.getElementById('project_option').style['transform'] = "rotate(0deg)";
                    document.getElementById('option_prj_modal').style.display = "none";
                    document.getElementById('option_prj_modal').style['animation'] = "opacity_anim .5s";
                    document.getElementById('option_prj_modal').style['opacity'] = 0;
                }
                on_off_option = !on_off_option;
                //var project_name = document.getElementById('project_name').innerHTML;
                //const a = document.querySelector('.href_class');
                //var string = 'projects/' + project_name + '.zip';
                //a.setAttribute('href', string);
            }

            function add_logo_modal (logo_img_url) {

                var img_str = '<img src ="'+logo_img_url+'" class="logo-style" id="img_id"><div id="chage_logo"><input type="file" id="chage_logo_choose_logo"></input><button id="btn_rechoose_logo" onclick="upload_logo_again();">Изменить логотип</button></div>';
                document.getElementById("add_logo").innerHTML = img_str;
            }

            function add_author_modal (author_js) {

                document.getElementById("add_author").innerHTML = author_js;
            }

            function add_creation_date_fnc (date) {
                //получаем только число.мес.год
                var temp_str = [], temp_str_2 = [], temp_str_3 = [];

                for (var i = 0,j = 0; i < 11;i++,j++) {
                    if(date[i] == '-') {
                        temp_str[j] = ' ';
                    } else {
                        temp_str[j] = date[i]; //2018 11 05
                    }
                }
               //переписываем число
               for (var i = 8, j = 0; i < 10; i++,j++)
                   temp_str_2[j] = temp_str[i];

               //переписываем месяц
               for (var i = 4, j = 2; i < 7; i++,j++)
                  temp_str_2[j] = temp_str[i];

               //переписываем год
               temp_str_2[5] = ' ';

               for (var i = 0, j = 6; i < 4; i++,j++)
                     temp_str_2[j] = temp_str[i]

               temp_str_2 = temp_str_2.join('');

               document.getElementById("add_creation_date").innerHTML = temp_str_2;
            }

            function addtag_in_modal_func () {

                var teg = document.getElementById('addtag_in_modal').value;
                var project_name = document.getElementById('project_name').innerHTML;

                teg = teg.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");

                if ((author!="guest") || (author!="guest1")) {

                    if (teg.length !=0) {

                        $.ajax({
                          type: 'POST',
                          url: 'php/add_teg_modal.php',
                          data: 'teg='+teg+'&prj_name='+project_name,
                          success: function(data){
                              if (data != "invalid_author") {
                                  add_tag_in_modal(data);
                                  document.getElementById('addtag_in_modal').value = "";
                              } else {
                                  alert("Вы не можете добавлять теги в чужие проекты");
                              }
                          }
                        });
                    }
                } else {
                    alert("Не авторизированным пользователям доступ запрещён");
                }

            }

            function add_coauthor_func () {

                document.getElementById('add_coauthor_block').style.display = "block";
                document.getElementById('add_coauthor_block_overlay').style.display = "block";
                document.getElementById('exampleModalLong').style.display = "none";
                $("input#search_coauthor").focus();
            }

            function add_coauthor_db_func (author) {
                var project_name = document.getElementById('project_name').innerHTML;

                $.ajax({
                    type: 'POST',
                    url: 'php/add_coauthor.php',
                    data: 'author='+author+'&prj_name='+project_name,
                    success: function(data){
                        if (data == "user_exists")
                            alert("Данный пользователь уже состоит в проекте");
                        else if (data == "invalid_user") {
                            alert("Вы не являетесь соавтором данного проекта");
                        }
                    }
                });
            }

            //удаление тегов при создании проекта
            function delete_tag (param) {

                var startstr = typestringteg.indexOf(param) - 17;
                var length = 88 + param.length * 2;

                typestringteg = typestringteg.replace(typestringteg.substring(startstr,length + startstr),'');
                document.getElementById("tagresult").innerHTML = typestringteg;



                if (typestring.indexOf(",") == -1) {//если нет запятых, то удаляем

                    typestring = typestring.replace(param,"");

                } else {

                    if (typestring.indexOf(param) == 0)
                        typestring = typestring.replace(param + ",","");
                    else
                        typestring = typestring.replace("," + param,"");
                }
            }

            function delete_tag_in_modal (param) {

                var project_name = document.getElementById('project_name').innerHTML;

                $.ajax({
                  type: 'POST',
                  url: 'php/delete_teg.php',
                  data: 'teg='+param+'&prj_name='+project_name,
                  success: function(data){
                      if (data != "invalid_author")
                          add_tag_in_modal(data);
                      else
                          alert("Вы не можете удялть теги в чужом проекте");
                  }
                });
            }

            function add_tag_in_modal(str) {
                if(str.length > 0){
                    var tegstr = [],tegstrhtml = [],countquot = 0,countwords = 0,countchar = 0;;

                    for (var i = 0; i < str.length - 1;i++)
                        if (str[i] == ',')
                            countquot++;

                    for (var i = 0; i < countquot + 1; i++)
                        tegstr[i] = [];

                    for (var i = 0; i < str.length;i++) {
                        if (str[i] != ',') {
                            tegstr[countwords][countchar] = str[i];
                            countchar++;
                        }
                        if (str[i] == ',')
                            countwords++;
                    }

                    for(var i = 0; i < tegstr.length; i++) {
                        tegstr[i] = tegstr[i].join('');
                    }

                    for (var i = 0; i < countquot + 1;i++) {
                        var tegstr1 = "'" + tegstr[i] + "'";
                        tegstrhtml = tegstrhtml + '<div class="teg">' + tegstr[i] + '<i class="fa fa-close margin-icon" onclick="delete_tag_in_modal(' + tegstr1 + ');"></i></div>';
                    }

                    document.getElementById('insert_teg').innerHTML = tegstrhtml;
                } else {
                    document.getElementById('insert_teg').innerHTML = "";
                }
            }

            function openfile (filename) {
                document.getElementById("modalbody").style.display = "none";
                document.getElementById("modalfooter").style.display = "none";
                document.getElementById("viewfilemodal").style.display = "block";
                document.getElementById("exit_fileview").style.display = "block";

                $.ajax({
                    type: 'POST',
                    url: 'php/openfileview.php',
                    data: 'path='+filename,
                    success: function(data){
                        //alert(data);
                        document.getElementById("main").innerHTML = data;
                    }
                });
            }

            function loge_out_fnc () {

                document.getElementById("enter-form").style["display"] = "block";
                document.getElementById("enter-success").style["display"] = "none";
                document.getElementById("box1").style["display"] = "block";
                document.getElementById("box1").style["display"] = "block";
                document.getElementById("login-block-style").style["display"] = "none";
                author = "";
                document.getElementById("myModalw").style["display"] = "none";

                  jQuery.ajax({
                      url:     "php/signout.php",
                      type:     "POST",
                      dataType: "html",
                      success: function(response) {

                          //document.getElementById("login_enter").innerHTML = response;
                      }
                   });

            }

            $( document ).ready(function() {
                $("#enter-2").click(
                    function(){
                    sendEnterForm('result_form', 'enter-form', 'php/Enter.php');
                    return false;
                    }
                );
            });

            function sendEnterForm(result_form, ajax_form, url) {
                jQuery.ajax({
                    url:     "php/Enter.php", //url страницы (action_ajax_form.php)
                    type:     "POST", //метод отправки
                    dataType: "html", //формат данных
                    data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
                    success: function(response) { //Данные отправлены успешно
                        if (response != 'invalid_user') {
                            document.getElementById("enter-form").style["display"] = "none";
                            document.getElementById("enter-success").style["display"] = "block";
                            document.getElementById("box1").style["display"] = "none";
                            document.getElementById("box1").style["display"] = "none";
                            document.getElementById("login-block-style").style["display"] = "flex";
                            document.getElementById("login-block-style").style["width"] = "10%";
                            document.getElementById("login-block-style").style["justify-content"] = "center";
                            document.getElementById("login-block-style").style["height"] = "3em !important";
                            document.getElementById("login-block-style").style["padding"] = "0";
                            document.getElementById("login-block-style").style["margin"] = "0";
                            document.getElementById("login-block-style").innerHTML = response;
                            author = response;

                            if (author == 'Administrator') {

                                var button_super_user = document.getElementById('new-user-btn');
                                var string_2 = "#popup1";

                                document.getElementById('registeration_user').style.display = 'block';
                                button_super_user.setAttribute('href',string_2);
                            } else {
                                document.getElementById('registeration_user').style.display = 'none';
                            }
                        } else {
                            alert('Вы ввели неправильно логин или пороль');
                            document.getElementById('enter_input_login_style').value = "";
                            document.getElementById('enter_input_password_style').value = "";
                        }
                    },
                    error: function(response) { // Данные не отправлены
                    }
                });
            }

            $( document ).ready(function() {
                $("#enter").click(
                    function(){
                    sendRegisterForm('result_form', 'register', 'php/Regisration.php');
                    return false;
                    }
                );
            });

            function sendRegisterForm(result_form, ajax_form, url) {
                jQuery.ajax({
                    url:     "php/Regisration.php", //url страницы (action_ajax_form.php)
                    type:     "POST", //метод отправки
                    dataType: "html", //формат данных
                    data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
                    success: function(response) { //Данные отправлены успешно
                        //alert(response);
                        //document.getElementById("result_form").innerHTML = response;
                        document.getElementById("register").style["display"] = "none";
                        document.getElementById("register-success").style["display"] = "block";
                    },
                    error: function(response) { // Данные не отправлены

                    }
                });
            }

            $( document ).ready(function() {
                $("#btn").click(
                    function(){
                    sendAjaxForm('result_form', 'f1', 'php/search.php');
                    return false;
                    }
                );
            });

            function sendAjaxForm(result_form, ajax_form, url) {
                jQuery.ajax({
                    url:     "php/search.php", //url страницы (action_ajax_form.php)
                    type:     "POST", //метод отправки
                    dataType: "html", //формат данных
                    data: jQuery("#"+ajax_form).serialize(),  // Сеарилизуем объект
                    success: function(response) { //Данные отправлены успешно

                        document.getElementById("result_form").innerHTML = response;
                        //var btn = document.getElementsByClassName("btn-show");
                    },
                    error: function(response) { // Данные не отправлены

                    }
                });
            }

            function delete_coauthor(author) {

                var project_name = document.getElementById('project_name').innerHTML;

                $.ajax({
                    type: 'POST',
                    url: 'php/delete_coauthor.php',
                    data: 'prj_name='+project_name+'&d_author='+author,
                    success: function(data){
                        $("#list_coauthor").click();
                        if (data == 'invalid_user') {
                            alert("Вы не можете удалять соавторов в чужом проекте");
                        }
                    }
                });
            }

            function close_tree_modal() {
                document.getElementById('tree').style.display = 'none';
                document.getElementById('exampleModalLong').style.display = 'block';
                document.getElementById('remove_id_input').value = "";
            }

            function close_rename_modal() {

                document.getElementById("exampleModalLong").style.display = "block";
                document.getElementById("rename_modal").style.display = "none";
                document.getElementById("rename_input").value = "";
            }

            $("#filter-btn-reset").click( function(){
                document.getElementById('date_before').value = "2012-04-15";
                document.getElementById('date_after').value = "2012-04-15";
                document.getElementById('filter-teg-btn').value = "";
            });

            $("#filter-btn").click( function(){
                var date_before = document.getElementById('date_before').value;
                var date_after = document.getElementById('date_after').value;
                var teg_str = document.getElementById('filter-teg-btn').value;
                var search = document.getElementById('search_q').value;
                mode = "filter_is_on";

                var xhr_4 = new XMLHttpRequest();
                xhr_4.open('POST', 'php/search.php', false);

                var form_4 = new FormData();

                form_4.append("mode", mode);                //мод
                form_4.append("search_q", search);            //запрос

                if (teg_str.length != 0) {

                    teg_str = teg_str.replace(new RegExp(" ",'g'),"");
                    form_4.append("tegs", teg_str);           //теги
                }

                if ((date_before != "2012-04-15") && (date_after != "2012-04-15")) {

                    if (Date.parse(date_before) < Date.parse(date_after)) {

                        form_4.append("date_before", date_before);
                        form_4.append("date_after", date_after);

                    } else if (Date.parse(date_before) > Date.parse(date_after)) {

                        form_4.append("date_before", date_before);
                        form_4.append("date_after", 0);

                    } else if (Date.parse(date_before) == Date.parse(date_after)) {

                        form_4.append("date_before", date_before);
                        form_4.append("date_after", 0);
                    }
                } else {
                    form_4.append("date_before", 0);
                    form_4.append("date_after", 0);
                }

                if (date_before == 0 && date_after == 0) {
                    form_4.append("date_before", 0);
                    form_4.append("date_after", 0);
                }

                xhr_4.send(form_4);

                if (xhr_4.status != 200) {
                    // обработать ошибку
                    alert( xhr_4.status + ': ' + xhr_4.statusText ); // пример вывода: 404: Not Found
                } else {
                    document.getElementById("result_form").innerHTML = xhr_4.responseText;
                    mode = "filter_is_off";
                    //alert(xhr_4.responseText);
                }
            });

            $("#list_coauthor").click( function(){

                document.getElementById('list_coauthor_block').style.display = "block";

                var project_name = document.getElementById('project_name').innerHTML;

                $.ajax({
                    type: 'POST',
                    url: 'php/list_coauthor.php',
                    data: 'prj_name='+project_name,
                    success: function(data){

                        document.getElementById('output_list_coauthors').innerHTML = data;

                    }
                });
            });

            $("#search_coauthor_btn").click( function(){

                var add_author = document.getElementById('search_coauthor').value;

                $.ajax({
                    type: 'POST',
                    url: 'php/search_coauthor.php',
                    data: 'author='+add_author,
                    success: function(data){

                        document.getElementById('search_result_coauthor').innerHTML = data;
                    }
                });

            });

            $("#close_add_coauthor_block").click( function(){

                document.getElementById('search_result_coauthor').innerHTML = "";
                document.getElementById('add_coauthor_block').style.display = "none";
                document.getElementById('add_coauthor_block_overlay').style.display = "none";
                document.getElementById('exampleModalLong').style.display = "block";
                $("#list_coauthor").click();
            });

            $("#btn_delete_project").click( function(){
                if (author != 'guest') {
                    var project_name = document.getElementById('project_name').innerHTML;

                    $.ajax({
                      type: 'POST',
                      url: 'php/delete_project.php',
                      data: 'prj_name='+project_name,
                      success: function(data){

                          alert(data);
                      }
                    });
                } else {
                    alert('Удалять можно только свои проекты и зарегестрированным пользователям');
                }
            });

            $("#btn_upload_modal").click( function(){

               var file = document.getElementById('choos_file').files[0];
               if (author != "guest") {

                   var xhr = new XMLHttpRequest();
                   xhr.open('POST', 'php/uploadmy.php', false);

                   var form = new FormData();

                   form.append("file", file);
                   form.append("folder", current_path);

                   xhr.send(form);

                   if (xhr.status != 200) {
                       // обработать ошибку
                       alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
                   } else {
                       // вывести результат
                       if (xhr.responseText != "invalid_user") {

                           $.ajax({
                              type: 'POST',
                              url: 'viewdir.php',
                              data: 'name='+current_path,
                              success: function(data){

                                  document.getElementById("open_content").innerHTML = data;
                              }
                           });
                       } else {
                           alert("Вы можете загружать файлы только в свои проекты");
                       }
                   }
               } else {
                   alert("Незарегистрированным пользователям нет доступа у загрузке файлов");
               }
            });

            $("#btn_close").click( function(){
                navpath = "";
                document.getElementById("modalbody").style.display = "block";
                document.getElementById("modalfooter").style.display = "block";
                document.getElementById("viewfilemodal").style.display = "none";
                document.getElementById("exit_fileview").style.display = "none";
                document.getElementById('project_option').style['transform'] = "rotate(0deg)";
                document.getElementById('option_prj_modal').style.display = "none";
                document.getElementById('option_prj_modal').style['animation'] = "opacity_anim .5s";
                document.getElementById('option_prj_modal').style['opacity'] = 0;
                on_off_option = 1;
                document.getElementById('list_coauthor_block').style.display = "none";
            });

            $("#exit_fileview").click( function(){
                document.getElementById("modalbody").style.display = "block";
                document.getElementById("modalfooter").style.display = "block";
                document.getElementById("viewfilemodal").style.display = "none";
                document.getElementById("exit_fileview").style.display = "none";
            });

            $("#login-block-style").click( function(){
                if (author == "Administrator") {
                    var button_super_user = document.getElementById('new-user-btn');
                    var string_2 = "#popup1";

                    document.getElementById('registeration_user').style.display = 'block';
                    button_super_user.setAttribute('href',string_2);
                } else {
                    document.getElementById('registeration_user').style.display = 'none';
                }
            });

            $("#create_project").click(function(){
                document.getElementById("modal_create_project").style.display = "block";
                document.getElementById("modal_create_project_overlay").style.display = "block";
                document.getElementById("modal_create_project").classList.add("modal_create_project-anim");
                document.getElementById("modal_create_project_overlay").classList.add("modal_create_project_overlay-anim");
                document.getElementById("modal_create_project").style["top"] = "50%";
                document.getElementById("modal_create_project").style['transform'] = 'translateY(-50%)';
                document.getElementById("modal_create_project_overlay").style['opacity'] = '1';
                document.getElementById("myModalw").style["display"] = "none";
            });

            $("#addtagbtn").click(function(){

                var current_str = [];
                var teg_s = document.getElementById('addtag').value;

                teg_s = teg_s.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");

                if ((typestring.length > 0) && (teg_s != 0)) {

                    if(typestring.indexOf(teg_s) == -1) {
                        typestring = typestring + "," + teg_s;

                        current_str = "'" + teg_s + "'";
                        typestringteg = typestringteg + '<div class="teg">' + teg_s + '<i class="fa fa-close margin-icon" onclick="delete_tag(' + current_str + ');"></i></div>';
                    }

                } else if ((typestring.length == 0) && (teg_s != 0)){

                    typestring = teg_s;

                    current_str = "'" + teg_s + "'";
                    typestringteg = '<div class="teg">' + teg_s + '<i class="fa fa-close margin-icon" onclick="delete_tag(' + current_str + ');"></i></div>';
                }

                document.getElementById("tagresult").innerHTML = typestringteg;
                document.getElementById('addtag').value = "";
            });

            $("#create").click(function(){

                var nameprj = document.getElementById('projectname').value;
                var logo = document.getElementById("fg").files[0];

                nameprj = nameprj.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");

                if (nameprj.length > 0) {

                    var xhr_2 = new XMLHttpRequest();
                    xhr_2.open('POST', 'php/createproject.php', false);

                    var form_2 = new FormData();

                    form_2.append("type", typestring);
                    form_2.append("author", author);
                    form_2.append("name", nameprj);
                    form_2.append("logo", logo);

                    xhr_2.send(form_2);

                    if (xhr_2.status != 200) {
                        // обработать ошибку
                        alert( xhr_2.status + ': ' + xhr_2.statusText ); // пример вывода: 404: Not Found
                    } else {
                      //alert(xhr_2.responseText);

                        if (xhr_2.responseText == "invalid_name_project")
                            alert("Проект с таким названием уже существует");
                        else {
                            typestring = "";
                            typestringteg = "";
                            document.getElementById("tagresult").innerHTML = typestringteg;
                            document.getElementById('projectname').value = "";
                            document.getElementById('modal_create_project').style.display = "none";
                            document.getElementById('modal_create_project_overlay').style.display = "none";
                        }
                    }
                } else {
                    alert("Проект должен иметь название");
                }
            });

            $("#btn_close_2").click(function(){
                document.getElementById('modal_create_project').style.display = "none";
                document.getElementById('modal_create_project_overlay').style.display = "none";
                typestring = " ";
                document.getElementById('projectname').value = "";
                typestringteg = " ";
                document.getElementById("tagresult").innerHTML = "";
            });

            $("#btn_delete_modal").click(function(){

                $('input:checkbox:checked').each(function(){

                    if(author != "guest") {

                        var file_name = $(this).val();
                        var project_name = document.getElementById("project_name").innerHTML;

                        $.ajax({
                            type: 'POST',
                            url: 'php/delete_file_dir.php',
                            data: 'file='+file_name+'&prj_name='+project_name,
                            success: function(data){
                                if (data == "invalid_user")
                                    alert("Вы не можете удалять файлы в чужом проекте");
                                else {

                                    $.ajax({
                                       type: 'POST',
                                       url: 'viewdir.php',
                                       data: 'name='+ data,
                                       success: function(data){

                                           document.getElementById("open_content").innerHTML = data;
                                       }
                                    });
                                }
                            }
                        });
                    } else {
                        alert("Незарегистрированным пользователям доступ к правке файлов запрещён");
                    }
                });
            });

            $("#clear_tree_btn").click(function(){
                document.getElementById('remove_id_input').value = "";
            });

            $("#btn_removee_modal").click(function(){

                document.getElementById('tree').style.display = 'block';
                document.getElementById('exampleModalLong').style.display = 'none';

                $("#clear_tree_btn_tranfer").click(function(){

                    var path_to_move = document.getElementById('remove_id_input').value;
                    var file_name = [];
                    var count = 0;

                    global_project_name = document.getElementById('project_name').innerHTML;

                    $('input:checkbox:checked').each(function(){

                        file_name[count] = $(this).val();
                        count++;
                    });

                    for (var i = 0; i < count; i++) {
                        //alert(file_name[i]);
                        var xhr_5 = new XMLHttpRequest();
                        xhr_5.open('POST', 'php/move.php', false);

                        var form_5 = new FormData();
                        form_5.append("prj_name", global_project_name);
                        form_5.append("path_to_move",path_to_move);
                        form_5.append("file_name",file_name[i]);

                        xhr_5.send(form_5);
                        //setTimeout(function() { }, 5000);
                    }
                    count = 0;
                    if (xhr_5.status != 200) {
                        // обработать ошибку
                        alert( xhr_5.status + ': ' + xhr_5.statusText ); // пример вывода: 404: Not Found
                    } else {
                        // вывести результат
                        if (xhr_5.responseText != "invalid_user") {

                            if (xhr_5.responseText == "invalid_path")
                                alert("Вы ввели не верный путь");
                            else {
                                //alert(xhr_5.responseText);
                                document.getElementById('tree').style.display = 'none';
                                document.getElementById('exampleModalLong').style.display = 'block';
                            }

                              $.ajax({
                                   type: 'POST',
                                   url: 'viewdir.php',
                                   data: 'name='+current_path,
                                   success: function(data){

                                       document.getElementById("open_content").innerHTML = data;
                                   }
                                });
                        } else {
                            alert("Вы можете можете перемещать файлы только в свои проектах");
                        }
                    }
                    document.getElementById('remove_id_input').value = "";
                });
            });

            $("#rename_modal_cansle_btn").click(function(){

                document.getElementById("rename_input").value = "";
            });

            $("#btn_rename_modal").click(function(){

                var str = "";
                file_name_old = "";

                document.getElementById("exampleModalLong").style.display = "none";
                document.getElementById("rename_modal").style.display = "block";

                $('input:checkbox:checked').each(function(){
                    file_name_old = $(this).val();
                });

                str = file_name_old.substring(file_name_old.lastIndexOf('/')+1,file_name_old.length-1);
                document.getElementById('rename_modal_header_h4').innerHTML = str;
            });

            $("#rename_modal_rename_btn").click(function(){

                var file_name_new = "", project_name = "";

                file_name_new = document.getElementById('rename_input').value;
                project_name = document.getElementById('project_name').innerHTML;

                file_name_new = file_name_new.replace(/[,\/#!$%\^&\*;:{}=\-_`~()]/g,"");

                if (file_name_new.length != 0) {

                    $.ajax({
                        type: 'POST',
                        url: 'php/renamef.php',
                        data: 'file_name_new='+file_name_new+'&file_name_old='+file_name_old+'&project_name='+project_name,
                        success: function(data){

                            if (data == "invalid_user") {

                                alert("Вы не можете переименовывать файлы в этом проекте");

                                document.getElementById("exampleModalLong").style.display = "block";
                                document.getElementById("rename_modal").style.display = "none";
                            } else if (data == "invalid_file_name") {
                                alert("Файл с таким именем уже существует");
                            } else {

                                $.ajax({
                                   type: 'POST',
                                   url: 'viewdir.php',
                                   data: 'name='+current_path,
                                   success: function(data){

                                       document.getElementById("open_content").innerHTML = data;
                                   }
                                });

                                document.getElementById("exampleModalLong").style.display = "block";
                                document.getElementById("rename_modal").style.display = "none";
                            }

                            document.getElementById("rename_input").value = "";
                        }
                    });
                }
            });

            $("#btn_download_project").click(function(){
                var project_name = document.getElementById('project_name').innerHTML;
                var filename = 'projects/'+project_name;

                    $.ajax({
                        type: 'POST',
                        url: 'php/downloadproject.php',
                        data: 'filename='+filename+'&project_name='+project_name,
                        success: function(data){
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: 'php/downloadproject_2.php',
                        data: 'file='+project_name+'.zip',
                        success: function(data){
                            //alert(data);
                        }
                    });

            });

            $("#btn_rename_project").click(function(){

                document.getElementById('exampleModalLong').style.display = 'none';
                document.getElementById('rename_project_modal').style.display = 'block';

                document.getElementById('rename_project_modal_header_text_2').innerHTML = document.getElementById('project_name').innerHTML;

            });

            $("#rename_project_modal_close").click(function(){

                document.getElementById('rename_project_input').value = '';

                document.getElementById('exampleModalLong').style.display = 'block';
                document.getElementById('rename_project_modal').style.display = 'none';
            });

            $("#rename_project_btn").click(function(){

                var rename = document.getElementById('rename_project_input').value;
                var project_name = document.getElementById('project_name').innerHTML;

                rename = rename.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g,"");

                if (rename.length > 0) {
                    $.ajax({
                        type: 'POST',
                        url: 'php/rename_project.php',
                        data: 'rename='+rename+'&project_name='+project_name,
                        success: function(data){
                            if (data == 'invalid_user'){
                                alert("Вы не можете переименовать чужой проект");
                                document.getElementById('exampleModalLong').style.display = 'block';
                                document.getElementById('rename_project_modal').style.display = 'none';
                            }
                            if (data == "invalid_project") {
                                alert("Проект переименовать не удалось");
                            }
                            if (data != "invalid_project") {

                                document.getElementById('exampleModalLong').style.display = 'block';
                                document.getElementById('rename_project_modal').style.display = 'none';
                            }
                        }
                    });
                }

            });

            $("#rename_project_btn_cancle").click(function(){
                document.getElementById('rename_project_input').value = '';
            });

            $('#add_logo').hover(function(){
                document.getElementById("chage_logo").style['height'] = '19%';
            },function(){
                document.getElementById("chage_logo").style['height'] = '0';
            });

            // Get the modal
            var modal = document.getElementById('myModalw');

            var modal_2 = document.getElementById('exampleModalLong');

            // Get the button that opens the modal
            var btn = document.getElementById("login-block-style");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                 modal.style.display = "block";
             }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                 modal.style.display = "none";
             }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                 if (event.target == modal) {
                     modal.style.display = "none";
                 }
             }

            window.onclick = function(event) {
                if (event.target == modal_2) {
                    modal_2.style.display = "none";
                    navpath = "";
                    document.getElementById("modalbody").style.display = "block";
                    document.getElementById("modalfooter").style.display = "block";
                    document.getElementById("viewfilemodal").style.display = "none";
                    document.getElementById("exit_fileview").style.display = "none";
                    document.getElementById('project_option').style['transform'] = "rotate(0deg)";
                    document.getElementById('option_prj_modal').style.display = "none";
                    document.getElementById('option_prj_modal').style['animation'] = "opacity_anim .5s";
                    document.getElementById('option_prj_modal').style['opacity'] = 0;
                    on_off_option = 1;
                    document.getElementById("addtag_in_modal").value = "";
                    document.getElementById('list_coauthor_block').style.display = "none";
                }
            }
        </script>

    </body>
</html>
