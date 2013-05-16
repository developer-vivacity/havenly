<a href="#">Home</a>
<table align="center">
<tr>
<td>User Name</td><td >User Email</td><td >Edit</td>
</tr>

<?php
//var_dump($this->session->userdata);
foreach($query as $key)
{
//var_dump($key);

echo '<tr>';

echo '<td class="user_col_div" id="u_name_'.$key->id.'">'.$key->username.'</td><td class="user_col_div" id="u_email_'.$key->id.'">'.$key->email.'</td><td class="user_col_div"><input type="button" value="Edit" id="'.$key->id.'" class="edit_button"></td></tr>';
}
echo '<tr><td colspan="3"> '.$link.'</td></tr>';
?>
</table>
