<div style="border: 1px solid rgb(153, 153, 153); padding: 10px;">
<form action="{{link_url::<?php echo $this->action; ?>}}#mail_2_unicode" id="mail_2_unicode" method="post">
<a name="mail_2_unicode"></a>
<input type="hidden" name="FORM_SUBMIT" value="mail_2_unicode" />
<?php echo $this->inputEmail->generateLabel();?>: <?php echo $this->inputEmail->generate();?>
<input type="submit" name="senden" value="generieren">
</form>
   <?php if(strlen($this->ucEmail)): ?><table><tr>
   <td><strong>E-Mail-Source: </strong></td><td><textarea cols="30" rows="5"><?php echo $this->uceEmail; ?></textarea></td>
   </tr><tr>
   <td colspan="2"><strong>so sieht es aus wenn E-Mail-Source in HTML eingebaut wurde: </strong><?php echo $this->ucEmail; ?></td>
   </tr><tr>
   <td><strong>Link-Source: </strong></td><td><textarea cols="30" rows="5"><a href='<?php echo $this->uceMailTo; ?>'><?php echo $this->uceEmail; ?></a></textarea></td>
   </tr><tr>
   <td colspan="2"><strong>so sieht es aus wenn Link-Source in HTML eingebaut wurde: </strong><a href="<?php echo $this->ucMailTo; ?>"><?php echo $this->ucEmail; ?></a></td>
   </tr>
   </table>
   <?php endif;?>
</div>