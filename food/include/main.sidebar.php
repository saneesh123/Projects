<div id="sidebar" style="margin-top:50px;" >
    <ul style="list-style-type:none;margin-left:10;padding:0;overflow:hidden;" >
      <div style="border-bottom:1px solid rgb(242, 203, 0);">
      <li><a href="#" style="text-align: center;text-decoration: none;"><h3 style="color:white;">Category</h3></li>
        </div>
      <?php $query1="select * from category";
      $result1=mysqli_query($bd,$query1);
      while($row1=mysqli_fetch_array($result1)){
       ?>

       <div>
      <li style="margin-top:30px;margin-left:30px;"><a href="#" style=" display: block;color: white;text-decoration: none;"><?php echo $row1['categoryname']; ?></li>
      </div>
    <?php } ?>
      <li style="margin-top:30px;margin-left:30px;"> <button type="button" name="button" class="btn btn-primary"><i class="fa fa-shopping-cart" aria-hidden="true"></i>cart
      <span id="number" style="width:40px;height:15px;background-color:rgb(201, 194, 193);padding:3px;border-radius:2px;">0</span></button></li>
    </ul>
    <div id="side-btn" onClick="slidecontent()">

   <span></span>
   <span></span>
   <span></span>

    </div>
</div>
