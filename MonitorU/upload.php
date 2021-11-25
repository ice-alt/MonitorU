


		<?php

				//Connects to the database
				require("TeamDatabaseConnect.php");


				//Variable to store messages
				$statusMsg = '';


				//Directory of the file where the uploaded documents are stored
				$targetDir = "uploads/";


				//If statement that triggers query from the database - Allows users documents and emails to be uploaded/inserted
				if(isset($_POST['upload'])){

					$email = $_POST['email'];

					
					//Checks if file is empty or not
					if(!empty($_FILES['file']['name'])){
						$fileName = basename($_FILES['file']['name']);
						$targetFilePath = $targetDir . $fileName;
						$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


						//Specifies the type of files that can be uploaded - by extension
						$allowTypes = array('jpg','jpeg','pdf');


						//Checks if the file to be uploaded has any of the aforementioned extensions
						if(in_array($fileType, $allowTypes)){

							//If statement that triggers query from the database - uploads file, then inserts filename and email from user
							if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)){
								$insert = $conn->query("INSERT INTO documents (email, file_name) VALUES ('$email', '$fileName')");


								//Checks if query is true or not
								if($insert){

									//Displays this message when query is true
									$statusMsg = "The file ".$fileName." has been uploaded sucessfully.";
								}

								else{

									//Displays this message when query is not true
									$statusMsg = "File upload failed. Please try again.";
								}
							}
							else{

								//Displays this message when file does not upload
								$statusMsg = "Sorry, there was an error uploading your file.";
							}
							
						}
						else{

							//Displays this message when file to be uploaded does not have any of the following extensions
							$statusMsg = "Sorry, only JPG, JPEG and PDF files are allowed to upload.";
						}
					}

					else{

						//Displays this message when user did not select any file to upload
						$statusMsg = "Please select a file to upload.";
					}


				}
				



		?>


	