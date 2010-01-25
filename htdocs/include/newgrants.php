<?php
require_once("pages.php");
$act = "newg";
$ref = "$adminPath?a=$act";
pageHeader();
?>

<script type="text/javascript" src="static/defaults.js"></script>

<form enctype="multipart/form-data" method="post"
      action="<?php echo $ref; ?>" >
  <ul>

    <h3><?php echo _("Grant parameters"); ?></h3>

    <li>
      <?php
        $error = ((@$_POST["submit"] === $act) && empty($_POST["nt"]));
        $class = "description" . ($error? " required": "");
      ?>
      <label class="<?php echo $class; ?>"><?php echo _("Notification e-mail"); ?></label>
      <div>
	<input name="nt" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo _("Type a <b>mandatory</b> e-mail address (or addresses) that"
		. " should be notified when the file is uploaded to the server."
		. " You can separate multiple addresses with commas.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Comment"); ?></label>
      <div>
	<input name="cmt" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo _("Type an <em>optional</em> comment for your upload grant and"
		. " resulting ticket. The comment will be shown along with the"
		. " grant and ticket information.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Password"); ?></label>
      <div>
	<input name="pass" class="element text medium" type="text" maxlength="255" value=""/>
        <input class="element button" type="button" value="<?php echo _("Generate"); ?>" onclick="passGen();"/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo _("Type an <em>optional</em> password that will be required to"
		. " both upload and download the file, as an additional"
		. " security measure.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Expire in total # of days"); ?></label>
      <div>
	<input name="gn" value="7" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo _("Type the <strong>maximal number of days</strong> the server"
		. " should wait for the upload grant to be used.  After this"
		. " period is passed without activity, the grant is removed the"
		. " server.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Send link to e-mail"); ?></label>
      <div>
	<input name="st" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo _("Type an <em>optional</em> e-mail address (or addresses)"
		. " that should immediately receive the link to the upload"
		. " grant. You can separate multiple addresses with commas.");
          ?>
      </small></p>
    </li>

    <h3><?php echo _("Ticket parameters"); ?></h3>

    <li>
      <label class="description"><?php echo _("Expire in total # of days"); ?></label>
      <div>
	<input name="dn" value="7" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo  _("Type the <strong>maximal number of days</strong> the"
		. " uploaded file is allowed to be kept on the server. After"
		. " this period is passed the file will be deleted from the"
		. " server.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Expire in # of hours after last dl"); ?></label>
      <div>
	<input name="hra" value="24" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
            echo _("Type the number of hours the uploaded file is allowed to be"
		. " kept on the server <strong>after being downloaded</strong>."
		. " After this period is passed without activity, the file will"
		. " be deleted from the server.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Expire after # of downloads"); ?></label>
      <div>
	<input name="dln" value="0" class="element text medium" type="text" maxlength="255" value=""/>
      </div>
      <p class="guidelines"><small>
	  <?php
	    echo _("Type the number of times the uploaded file is"
		. " <strong>allowed to be downloaded in total</strong>. After"
		. " this amount is reached the file will be deleted from the"
		. " server.");
          ?>
      </small></p>
    </li>

    <li>
      <label class="description"><?php echo _("Permanent ticket / upload"); ?></label>
      <span>
	<input name="nl" class="element checkbox" type="checkbox" value="1"/>
	<label class="choice">Do not expire</label>
      </span>
      <p class="guidelines"><small>
	  <?php
            echo _("Set this checkmark if you do not want the uploaded file to expire.");
          ?>
      </small></p>
    </li>

    <li class="buttons">
      <input type="hidden" name="submit" value="<?php echo $act; ?>"/>
      <input id="submit" type="submit" value="<?php echo _("Create"); ?>"/>
      <input type="reset" value="<?php echo _("Reset"); ?>"/>
      <input type="button" value="<?php echo _("Set as defaults"); ?>" onclick="setDefaults();"/>
    </li>
  </ul>
</form>

<?php
pageFooter();
?>