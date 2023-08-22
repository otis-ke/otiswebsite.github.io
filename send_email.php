<?php
if (isset($_POST['submit'])) {
  // Get form data
  $name = $_POST['user_name'];
  $email = $_POST['user_email'];
  $project = $_POST['user_project'];

  // Email recipient (your email address)
  $to = 'vincentotiskisia@gmail.com';

  // Email subject
  $subject = 'New Form Submission';

  // Email message
  $message = "Name: $name\n\n";
  $message .= "Email: $email\n\n";
  $message .= "Project:\n$project\n";

  // Email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // Send email to recipient
  mail($to, $subject, $message, $headers);

  // Send confirmation email to the user
  $user_subject = 'Confirmation - Form Submission';
  $user_message = "Dear $name,\n\n";
  $user_message .= "Thank you for submitting the form. We have received your message and will get back to you soon.\n\n";
  $user_message .= "Best regards,\n vincent otis";

  mail($email, $user_subject, $user_message, $headers);

  // Redirect back to the contact page
  header("Location: contact.php?success=true");
  exit();
}
?>
