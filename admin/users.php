<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental</title>
    <link rel="stylesheet" href="../css/admin.css">
    <!-- <link rel="stylesheet" href="css/admin.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body >



    <section class="container my-5">
        <h1 class="text-center mb-4 text-muted"><i class="bi bi-people text-danger"></i> Users</h1>
     
        <div class="row">
           <?php
              $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
              if(mysqli_num_rows($select_users) > 0){
                 while($fetch_users = mysqli_fetch_assoc($select_users)){
           ?>
           <div class="col-md-4 mb-4">
              <div class="card p-3 shadow-sm">
                 <p><strong>User ID:</strong> <span><?php echo $fetch_users['id']; ?></span></p>
                 <p><strong>Username:</strong> <span style="text-transform: capitalize;"><?php echo $fetch_users['name']; ?></span></p>
                 <p><strong>Email:</strong> <span><?php echo $fetch_users['email']; ?></span></p>
                 <p><strong>Type:</strong> <span style="text-transform: capitalize;" class="<?php if($fetch_users['user_type'] == 'admin'){ echo 'text-danger'; } ?>"><?php echo $fetch_users['user_type']; ?></span></p>
     
                 <form action="admin_users.php" method="post">
                    <input type="hidden" name="user_id" value="<?php echo $fetch_users['id']; ?>">
                    <div class="mb-3">
                       <label for="user_type" class="form-label text-danger fw-bold">Change User Type</label>
                       <select name="user_type" class="form-select" required>
                          <option value="user" <?php if($fetch_users['user_type'] == 'user'){ echo 'selected'; } ?>>User</option>
                          <option value="admin" <?php if($fetch_users['user_type'] == 'admin'){ echo 'selected'; } ?>>Admin</option>
                       </select>
                    </div>
                    <input type="submit" name="update_user_type" value="Update Type" class="btn btn-secondary w-100">
                 </form>
     
                 <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Delete this user?');" class="btn btn-danger mt-3 w-100">Delete User</a>
              </div>
           </div>
           <?php
                 }
              }
           ?>
        </div>
     </section>











  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <!-- Development version -->
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
  
  <!-- Production version -->
  <script src="https://unpkg.com/lucide@latest"></script>
  
  <script>
    lucide.createIcons();
  </script>
  
    <!-- swiper -->
   <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
  
  </html>