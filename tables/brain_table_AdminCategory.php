 <tbody>
<?php $ctr = 0; $category = $brain_CategoryDB->getCategory(); foreach ($category as $c ) { ?>
	<tr id="yu<?= $c->getCid(); ?>">
		<td><?= $ctr += 1; ?>.</td>
		<td ><?= $c->getCategory(); ?></td> 
		<td class="right">
			  <a href="" class="delete waves-light red-text" data-param1="<?= $c->getCid();?>" ><i class="mdi mdi-delete tooltipped" data-position="bottom" data-delay="50" data-tooltip="Delete"></i></a>
			  <a class="waves-light mod blue-text" href="#modal_edit1" data-param1="<?= $c->getCid(); ?>" data-param2="<?= $c->getCategory(); ?>"><i class="mdi mdi-pencil tooltipped" data-position="bottom" data-delay="50" data-tooltip="Update"></i></a>
		</td>
	</tr>
<?php } ?>
</tbody>
				
  				<div id="modal_edit1" class="modal">
				    <div class="modal-content">
				       <h4 class="head_ed">Edit Category</h4>
				      			<div class="row">
                                    <form class="col s12 m8 l12" id="update_Cat">
                                    <input type="hidden" name="cid" value="" id="update1">                                 
                                    <input type="hidden" name="action" value="brain_update_Category">
                                        <div class="row">
		                                        <div class="input-field col s12 m8 l12 center">
		                                        	 <i class="large glyphicon glyphicon-edit circle blue-text"></i>
		                                        </div>
                                          
                                              <div class="input-field col s12 m8 l12">
	                                              <input id="edit" name="cat_nam" type="text" class="ed_cat" value="" autofocus required>
	                                              <label for="edit">Update Category:</label>
                                               </div>
                                        </div>                      
                                </div>
				    </div>
				    <div class="modal-footer">
				      <button type="submit" class="update modal-action modal-close waves-effect waves-blue btn-flat" data-param="<?= $c->getCid();?>" data-param1="<?= $c->getCategory();?>" >Edit</button>
				      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Close</a>			      
				   	  </form>
				    </div>
				 </div>