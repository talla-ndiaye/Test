<?php
class PHP_Email_Form {
  public $to = '';
  public $from_name = '';
  public $from_email = '';
  public $subject = '';
  public $smtp = array();
  public $ajax = false;
  private $messages = array();
  private $error_message = '';

  public function add_message($content, $key = '', $priority = 0) {
    $this->messages[] = array(
      'content' => $content,
      'key' => $key,
      'priority' => $priority
    );
  }

  public function send() {
    if (empty($this->to)) {
      $this->error_message = 'Receiving email address is missing!';
      return false;
    }

    if (empty($this->from_email)) {
      $this->error_message = 'Sender email address is missing!';
      return false;
    }

    $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
    $headers .= "Reply-To: " . $this->from_email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message_content = '';
    foreach ($this->messages as $message) {
      $message_content .= "<p><strong>" . $message['key'] . ":</strong> " . $message['content'] . "</p>";
    }

    $send_mail = false;
    if (!empty($this->smtp)) {
      $send_mail = $this->send_smtp($this->to, $this->subject, $message_content, $headers);
    } else {
      $send_mail = mail($this->to, $this->subject, $message_content, $headers);
    }

    if (!$send_mail) {
      $this->error_message = 'Unable to send the email!';
      return false;
    }

    return true;
  }



  public function get_error_message() {
    return $this->error_message;
  }
}
?>
