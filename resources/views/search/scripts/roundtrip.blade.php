<script>
// disable the return date input first.
document.getElementById('return_date').disabled = true;
// if return radio button clicked we'll enable the return input
function enable_return_date()
{
  document.getElementById('return_date').disabled = false;
}
// if one way radio button clicked we'll disable the return input
function disable_return_date()
{
  document.getElementById('return_date').disabled = true;
}
</script>
