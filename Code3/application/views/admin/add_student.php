<?php
?>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_student">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
		<h3>Add student</h3><br>				
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Department Name</label>
  <input type="text"  name="dcode"  class="form-control" required>
        </div>
    </div>
						<div class="control-group-form-group">
							<div class="controls">
							<label>Programme  Name</label><br>
							<input type="text" class="form-control" id="Department" name="Department" required>
						</div>
						<div class="form-group">
							<label >Semester</label><br>
							<select name="ccode" class="form-control" required>
                             <Option value="">Select</option>
							 <Option value="II sem">I Sem</option>
							 <Option value="II sem">II Sem</option>
							 <Option value="II sem">III Sem</option>
                             <Option value="IV sem">IV Sem</option>
							 <Option value="II sem">V Sem</option>
                             <Option value="VI sem">VI Sem</option>
                            </select>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Student Strength</label><br>
							<input type="text" name="Dept_name" class="form-control form-control-sm" required value="<?php echo isset($dept_name) ? $dept_name : '' ?>">
                         </div>
						 <div class="form-group">
							<label >Campus Code</label><br>
							<select name="ccode" class="form-control" required>
                             <Option value="">Select</option>
							 <Option value="mu">111</option>
							 <Option value="pgcenter">222</option>
                            </select>
						</div>

						 <div class="form-group">
							<label for="" class="control-label">Department Code</label><br>
							<input type="text" class="form-control" id="Department" name="Department" required>
							
                         </div>
						
						
					
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=student_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>

