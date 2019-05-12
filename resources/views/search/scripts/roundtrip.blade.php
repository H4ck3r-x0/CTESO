<script>
// disable the return date input first.
document.getElementById('return_date').disabled = true;
document.getElementById('price_message').style.display = "none";
// if return radio button clicked we'll enable the return input
function enable_return_date()
{
  document.getElementById('return_date').disabled = false;
  document.getElementById('price_message').style = "display: block; color: red";
}
// if one way radio button clicked we'll disable the return input
function disable_return_date()
{
  document.getElementById('return_date').disabled = true;
  document.getElementById('price_message').style.display = "none";
}
</script>
