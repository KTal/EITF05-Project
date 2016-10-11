<?php
/**
 * We just want to hash our password using the current DEFAULT algorithm.
 * This is presently BCRYPT, and will produce a 60 character result.
 *
 * Beware that DEFAULT may change over time, so you would want to prepare
 * By allowing your storage to expand past 60 characters (255 would be good)
 */
$hash = password_hash("qwe", PASSWORD_DEFAULT);
echo password_verify("qwe", "$2y$10$5R/ueLV8TVfTsr4hUKtRjOsz7NK1rLtadXkmN3yCqLyYB0Jc/DdZq");
print microtime(true);
?>
