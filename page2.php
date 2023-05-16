
<!doctype html>
<html data-appearance="system">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>myTinyTodo Demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/gif" href="/demo/content/theme/images/logo.gif" />
  <link rel="stylesheet" type="text/css" href="/demo/content/theme/style.css?v=1.7.3" media="all" />
  <link rel="stylesheet" type="text/css" href="/demo/content/theme/markdown.css?v=1.7.3" media="all" />
    <link rel="stylesheet" type="text/css" href="/demo/content/theme/dark.css?v=1.7.3" media="screen" />
    <link rel="stylesheet" type="text/css" href="/demo/content/theme/print.css?v=1.7.3" media="print" />
    </head>

<body >

<script type="text/javascript" src="/demo/content/jquery/jquery-3.6.1.min.js"></script>
<script type="text/javascript" src="/demo/content/jquery/jquery-ui-1.13.2.min.js"></script>
<script type="text/javascript" src="/demo/content/jquery/jquery.ui.touch-punch-1.0.8-2.js"></script>
<script type="text/javascript" src="/demo/content/mytinytodo.js?v=1.7.3"></script>
<script type="text/javascript" src="/demo/content/mytinytodo_api.js?v=1.7.3"></script>

<script type="text/javascript">
$().ready(function(){
  mytinytodo.setApiDriver(MytinytodoAjaxApi).init({"token":"530fa85a-d7c3-47cc-b8a5-84e9231410d7","title":"myTinyTodo Demo","lang":{"daysMin":["Su","Mo","Tu","We","Th","Fr","Sa"],"daysLong":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"monthsShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"monthsLong":["January","February","March","April","May","June","July","August","September","October","November","December"],"confirmDelete":"Are you sure you want to delete the task?","confirmLeave":"There can be unsaved data. Do you really want to leave?","actionNoteSave":"save","actionNoteCancel":"cancel","error":"Some error occurred (click for details)","denied":"Access denied","listNotFound":"List not found","noPublicLists":"No public tasks","invalidpass":"Wrong password","addList":"Create new list","addListDefault":"Todo","renameList":"Rename list","deleteList":"This will delete current list with all tasks in it.\nAre you sure?","clearCompleted":"This will delete all completed tasks in the list.\nAre you sure?","settingsSaved":"Settings saved. Reloading...","tags":"Tags","tasks":"Tasks","f_past":"Overdue","f_today":"Today and tomorrow","f_soon":"Soon","alltasks":"All tasks","set_header":"Settings","_rtl":"0"},"mttUrl":"https://www.mytinytodo.net/demo/","homeUrl":"https://www.mytinytodo.net/demo/","needAuth":false,"isLogged":true,"showdate":true,"showtime":true,"duedatepickerformat":"n/j/y","firstdayofweek":1,"calendarIcon":"/demo/content/theme/images/calendar.svg","autotag":true,"markdown":true}).run();
});
</script>

<div id="mtt">

<!-- Top block -->
<div class="topblock">

  <div class="topblock-title">
    <h2>myTinyTodo Demo</h2>
  </div>

  <div class="topblock-bar">
  <div id="msg"><span class="msg-text"></span><div class="msg-details"></div></div>
  <div class="bar-menu">
    <a href="#settings" class="mtt-only-authorized" data-settings-link="index">Settings</a>
    <span id="bar_public" style="display:none" class="mtt-need-auth-enabled">Public Tasks</span>
    <a href="#login" id="login_btn" class="mtt-need-auth-enabled">Login</a>
    <a href="#logout" id="logout_btn" class="mtt-need-auth-enabled" style="display:none" >Logout</a>
    </span>
  </div>
  </div>

</div>
<!-- End of Top block -->


<!-- Page: Tasks -->
<div id="page_tasks" style="display:none">

<div id="lists">
  <div class="tabs-n-button">
    <ul class="mtt-tabs"></ul>
    <div class="mtt-tabs-new-button" title="New list"><div class="tab-height-wrapper"><span></span></div></div>
  </div>
  <div id="tabs_buttons">
    <div class="tab-height-wrapper">
      <div class="mtt-tabs-select-button mtt-img-button" title="Select list"><span></span></div>
    </div>
  </div>
</div>


<div id="toolbar">

<div class="newtask-n-search-container">
<div class="taskbox-c">
  <div class="mtt-taskbox">
   <form id="newtask_form" method="post">
     <input type="text" name="task" value="" maxlength="250" id="task" autocomplete="off" placeholder="New task"/>
     <div id="newtask_submit" class="mtt-taskbox-icon" title="Add"></div>
   </form>
  </div>
  <a href="#" id="newtask_adv" class="mtt-img-button" title="Advanced"><span></span></a>
</div>
<div class="searchbox-c">
  <div class="mtt-searchbox">
    <input type="text" name="search" value="" maxlength="250" id="search" autocomplete="off" />
    <div class="mtt-searchbox-icon mtt-icon-search"></div>
    <div id="search_close" class="mtt-searchbox-icon mtt-icon-cancelsearch"></div>
  </div>
</div>
</div>

<div id="searchbar" style="display:none">Searching for <span id="searchbarkeyword"></span></div>

<div id="mtt-tag-toolbar" style="display:none">
  <div class="tag-toolbar-content">
  <span id="mtt-tag-filters"></span>
  </div>
  <div class="tag-toolbar-close"><div id="mtt-tag-toolbar-close" class="mtt-img-button"><span></span></div></div>
</div>

</div>



<h3 class="page-title">
  <span id="taskview" class="mtt-menu-button"><span class="btnstr">Tasks</span> (<span id="total">0</span>) <span class="arrdown"></span></span>
  <span class="mtt-notes-showhide">Notes: <a href="#" id="mtt-notes-show">Show</a> / <a href="#" id="mtt-notes-hide">Hide</a></span>
  <span id="tagcloudbtn" class="mtt-menu-button">Tags <span class="arrdown2"></span></span>
</h3>

<div id="tasks_info" style="display:none;">
  <div class="v"></div>
</div>

<ol id="tasklist" class="sortable"></ol>

</div>
<!-- End of page_tasks -->


<!-- Page: Edit Task -->
<div id="page_taskedit" style="display:none">

<h3 class="page-title mtt-inadd"><a class="mtt-back-button"></a>New Task</h3>
<h3 class="page-title mtt-inedit"><a class="mtt-back-button"></a>Edit Task <span id="taskedit_id"></span></h3>

<div id="taskedit_info" class="mtt-inedit">
    <div class="date-created">Created: <span class="date-created-value"></span></div>
    <div class="date-completed">Completed: <span class="date-completed-value"></span></div>
    <div class="date-edited">Last edited: <span class="date-edited-value"></span></div>
</div>

<form id="taskedit_form" name="edittask" method="post">
<input type="hidden" name="isadd" value="0" />
<input type="hidden" name="id" value="" />
<div class="form-row form-row-short">
  <span class="h">Priority</span>
  <select name="prio" class="form-input">
    <option value="2">+2</option><option value="1">+1</option><option value="0" selected="selected">&plusmn;0</option><option value="-1">&minus;1</option>
  </select>
</div>
<div class="form-row form-row-short">
  <span class="h">Due </span>
  <input name="duedate" id="duedate" value="" class="in100 form-input" title="Y-M-D, M/D/Y, D.M.Y, M/D, D.M" autocomplete="off" type="text" />
</div>
<div class="form-row-short-end"></div>
<div class="form-row"><div class="h">Task</div> <input type="text" name="task" value="" class="in500 form-input" maxlength="250" autocomplete="off" /></div>
<div class="form-row"><div class="h">Note</div> <textarea name="note" class="in500 form-input" spellcheck="false"></textarea></div>
<div class="form-row"><div class="h">Tags</div>
  <table cellspacing="0" cellpadding="0" width="100%"><tr>
    <td><input type="text" name="tags" id="edittags" value="" class="in500 form-input" maxlength="250" autocomplete="off" /></td>
    <td class="alltags-cell">
      <a href="#" id="alltags_show">Show all</a>
      <a href="#" id="alltags_hide" style="display:none">Hide all</a>
    </td>
  </tr></table>
</div>
<div class="form-row" id="alltags" style="display:none;">All tags: <span class="tags-list"></span></div>
<div class="form-row form-bottom-buttons">
  <button type="submit">Save</button>
  <button class="mtt-back-button">Cancel</button>
</div>
</form>

</div>
<!-- end of page_taskedit -->


<div id="page_ajax" style="display:none">
</div>


<!-- Page: Login -->
<div id="page_login" style="display:none">
  <div id="authform">
  <form id="login_form">
    <div class="auth-content">
      <div class="h">Password</div>
      <div><input type="password" name="password" id="password" class="form-input" /></div>
    </div>
    <div class="form-bottom-buttons">
        <button type="submit">Login</button>
        <button type="button" class="mtt-back-button">Cancel</button>
    </div>
  </form>
</div>
</div>
<!-- end of page_login -->


<div id="priopopup" style="display:none">
  <span class="prio-neg prio-neg-1">&minus;1</span>
  <span class="prio-zero">&plusmn;0</span>
  <span class="prio-pos prio-pos-1">+1</span>
  <span class="prio-pos prio-pos-2">+2</span>
</div>

<div id="taskviewcontainer" class="mtt-menu-container" style="display:none">
<ul>
  <li id="view_tasks">Tasks (<span id="cnt_total">0</span>)</li>
  <li id="view_past">Overdue (<span id="cnt_past">0</span>)</li>
  <li id="view_today">Today and tomorrow (<span id="cnt_today">0</span>)</li>
  <li id="view_soon">Soon (<span id="cnt_soon">0</span>)</li>
</ul>
</div>

<div id="tagcloud" style="display:none">
  <div class="actions">
    <div><input id="tagcloudAllLists" type="checkbox" /> <label for="tagcloudAllLists">Show tags from all lists</label></div>
    <div id="tagcloudcancel" class="mtt-img-button"><span></span></div>
  </div>
  <div class="content">
    <div id="tagcloudload"></div>
    <div id="tagcloudcontent"></div>
  </div>
</div>


<div id="listmenucontainer" class="mtt-menu-container" style="display:none">
<ul>
  <li class="mtt-need-list mtt-need-real-list" id="btnRenameList">Rename list</li>
  <li class="mtt-need-list mtt-need-real-list" id="btnDeleteList">Delete list</li>
  <li class="mtt-need-list mtt-need-real-list" id="btnClearCompleted">Clear completed tasks</li>
  <li class="mtt-need-list" id="btnHideList">Hide list</li>
  <li class="mtt-menu-delimiter"></li>
  <li class="mtt-need-list mtt-need-real-list mtt-menu-indicator" submenu="listsharemenucontainer"><div class="submenu-icon"></div>Share</li>
  <li class="mtt-menu-delimiter mtt-need-real-list"></li>
  <li class="mtt-need-list mtt-need-real-list sort-item" id="sortByHand"><div class="menu-icon"></div>Sort by hand <span class="mtt-sort-direction"></span></li>
  <li class="mtt-need-list sort-item" id="sortByDateCreated"><div class="menu-icon"></div>Sort by date created <span class="mtt-sort-direction"></span></li>
  <li class="mtt-need-list sort-item" id="sortByPrio"><div class="menu-icon"></div>Sort by priority <span class="mtt-sort-direction"></span></li>
  <li class="mtt-need-list sort-item" id="sortByDueDate"><div class="menu-icon"></div>Sort by due date <span class="mtt-sort-direction"></span></li>
  <li class="mtt-need-list sort-item" id="sortByDateModified"><div class="menu-icon"></div>Sort by date modified <span class="mtt-sort-direction"></span></li>
  <!--<li class="mtt-need-list sort-item" id="sortByTitle"><div class="menu-icon"></div>Sort by title <span class="mtt-sort-direction"></span></li>-->
  <li class="mtt-menu-delimiter"></li>
  <li class="mtt-need-list" id="btnShowCompleted"><div class="menu-icon"></div>Show completed tasks</li>
</ul>
</div>

<div id="listsharemenucontainer" class="mtt-menu-container" style="display:none">
<ul>
  <li class="mtt-need-list mtt-need-real-list" id="btnPublish"><div class="menu-icon"></div>Publish list</li>
  <li class="mtt-need-list mtt-need-real-list" id="btnRssFeed"><div class="menu-icon"></div><a href="#">RSS Feed</a></li>
  <li class="mtt-need-list mtt-need-real-list" id="btnExportCSV"><a href="#">Export to CSV</a></li>
  <li class="mtt-need-list mtt-need-real-list" id="btnExportICAL"><a href="#">Export to iCalendar</a></li>
  <li class="mtt-menu-delimiter"></li>
  <li class="mtt-need-list mtt-need-real-list" id="btnFeedKey"><div class="menu-icon"></div>Enable feed key</li>
  <li class="mtt-need-list mtt-need-real-list" id="btnShowFeedKey"><div class="menu-icon"></div>Show feed key</li>
</ul>
</div>

<div id="taskcontextcontainer" class="mtt-menu-container" style="display:none">
<ul>
  <li id="cmenu_edit"><b>Edit</b></li>
  <!--<li id="cmenu_note">Edit Note</li>-->
  <li id="cmenu_prio" class="mtt-menu-indicator" submenu="cmenupriocontainer"><div class="submenu-icon"></div>Priority</li>
  <li id="cmenu_move" class="mtt-menu-indicator" submenu="cmenulistscontainer"><div class="submenu-icon"></div>Move to</li>
  <li id="cmenu_delete">Delete</li>
</ul>
</div>

<div id="cmenupriocontainer" class="mtt-menu-container" style="display:none">
<ul>
  <li id="cmenu_prio:2"><div class="menu-icon"></div>+2</li>
  <li id="cmenu_prio:1"><div class="menu-icon"></div>+1</li>
  <li id="cmenu_prio:0"><div class="menu-icon"></div>&plusmn;0</li>
  <li id="cmenu_prio:-1"><div class="menu-icon"></div>&minus;1</li>
</ul>
</div>

<div id="cmenulistscontainer" class="mtt-menu-container" style="display:none">
<ul>
</ul>
</div>

<div id="slmenucontainer" class="mtt-menu-container" style="display:none">
<ul>
  <li id="slmenu_list:-1" class="list-id--1 mtt-only-authorized"><div class="menu-icon"></div><a href="#alltasks">All tasks</a></li>
  <li class="mtt-menu-delimiter slmenu-lists-begin mtt-need-list"></li>
</ul>
</div>

<div id="modal" style="display:none">
  <div class="modal-content">
    <div id="modalMessage"></div>
    <input id="modalTextInput" type="text" />
  </div>
  <div class="modal-bottom form-bottom-buttons">
    <button type="submit" id="btnModalOk">OK</button>
    <button id="btnModalCancel">Cancel</button>
  </div>
</div>

</div><!-- end of #mtt -->

<div id="footer">
  <div id="footer_content">
    <span>Powered by <a href="http://www.mytinytodo.net/" class="powered-by-link">myTinyTodo</a>&nbsp;1.7.3</span>
  </div>
</div>

</body>
</html>
