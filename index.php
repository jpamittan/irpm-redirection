<?php
    require_once 'config.php';
    $env = isset($_GET['env']) ? $_GET['env'] : null;
    $submission_id = isset($_GET['submission_id']) ? $_GET['submission_id'] : null;
    $token = isset($_GET['token']) ? $_GET['token'] : null;
    if (
        empty($env) || 
        empty($submission_id) ||  
        empty($token)
    ) {
        header('Location: error.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Synchronosure</title>
        <meta name="description" content="Synchronosure">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="submitTest()">
        Redirecting. Please wait...
        <form 
            id="frm" 
            action="<?php echo $connections[$env]['url']; ?>/api/api/redirect?submissionId=<?php echo $submission_id; ?>" 
            method="POST"
        >
            <input 
                type="hidden" 
			    name="ONEviewContextToken" 
                value="<?php echo $token; ?>"
            />
        </form>
        <script>
            function submitTest() {
                document.getElementById("frm").submit();
            }
        </script>
    </body>
</html>