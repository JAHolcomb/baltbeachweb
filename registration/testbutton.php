

<form name="form1" method="post" action="">



<div id="formsubmitbutton">
      <input name="Submit" type="submit" tabindex="60" onclick="ButtonClicked()" value="Register" />
    </div>
    <div id="buttonreplacement" style="margin-left:30px; display:none;">
<img src="../images/preload.gif" alt="loading...">
</div>


</form>

<script type="text/javascript">
function ButtonClicked()
{
   document.getElementById("formsubmitbutton").style.display = "none"; // to undisplay
   document.getElementById("buttonreplacement").style.display = ""; // to display
   return true;
}
var FirstLoading = true;
function RestoreSubmitButton()
{
   if( FirstLoading )
   {
      FirstLoading = false;
      return;
   }
   document.getElementById("formsubmitbutton").style.display = ""; // to display
   document.getElementById("buttonreplacement").style.display = "none"; // to undisplay
}
// To disable restoring submit button, disable or delete next line.
document.onfocus = RestoreSubmitButton;
</script>








