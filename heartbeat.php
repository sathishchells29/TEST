<?php
// Start session if not already started
session_start();

// Set heartbeat interval (in seconds)
$heartbeat_interval = 5;

// Store the timestamp of the last heartbeat
if (!isset($_SESSION['last_heartbeat'])) {
    $_SESSION['last_heartbeat'] = time();
}

// Check if the last heartbeat was received more than the interval
if (time() - $_SESSION['last_heartbeat'] > $heartbeat_interval) {
    // Heartbeat expired
    echo json_encode(['status' => 'inactive']);
} else {
    // Update last heartbeat timestamp
    $_SESSION['last_heartbeat'] = time();
    echo json_encode(['status' => 'active']);
}
?>
