 				<option value="selected" disabled selected>Select Subject</option>
                    <?php foreach ($category as $c) { ?>
                            <option value="<?= $c->getCategory();  ?>"><?= $c->getCategory();  ?></option>
                     <?php } ?>   