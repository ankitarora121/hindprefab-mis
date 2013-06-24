<?php include "_barebones.php"; ?>
<?php
session_start();

if (!isset($_COOKIE["ID_my_site"]) || !$_SESSION["is_admin"])
{
  header( "Location: login.php" );
}

?>

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Create New Project</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="project_id">Project ID</label>
  <div class="controls">
    <input id="project_id" name="project_id" type="text" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="project_name">Project Name</label>
  <div class="controls">
    <input id="project_name" name="project_name" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="client">Client</label>
  <div class="controls">
    <input id="client" name="client" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="contractor">Contractor</label>
  <div class="controls">
    <input id="contractor" name="contractor" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="project_coordinator">Project Coordinator</label>
  <div class="controls">
    <select id="project_coordinator" name="project_coordinator" class="input-xlarge">
      <option>Option one</option>
      <option>Option two</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="regional_office">Regional Office</label>
  <div class="controls">
    <input id="regional_office" name="regional_office" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Textarea -->
<div class="control-group">
  <label class="control-label" for="remarks_status">Remarks/Status</label>
  <div class="controls">                     
    <textarea id="remarks_status" name="remarks_status"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="startdate_contr">Start Date (Contractor)</label>
  <div class="controls">
    <input id="startdate_contr" name="startdate_contr" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="enddate_contr">End Date (Contractor)</label>
  <div class="controls">
    <input id="enddate_contr" name="enddate_contr" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="startdate_client">Start Date (Client)</label>
  <div class="controls">
    <input id="startdate_client" name="startdate_client" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="enddate_client">End Date (Client)</label>
  <div class="controls">
    <input id="enddate_client" name="enddate_client" type="text" placeholder="" class="input-xlarge datepicker" data-date-format="yyyy-mm-dd" >
    
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>













</body>
</html>