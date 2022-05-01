<?php

// The page that includes our actions for various possibilities OR controlling codes.
// Farklı olasılıklar için ya da kontroller için kodlarımızı içeren sayfa.

function upload_file()
{
	if ($_FILES['file']['error'] == 4)
{
	echo "TR/ Lütfen bir dosya yükleyiniz"; 
		echo "<br>";
	echo "ENG/ Please upload a file.";
} 
	else 
	{
		print_r($_FILES['file']);
	
		echo "<br>"; echo "<br>";
		if (is_uploaded_file($_FILES['file']['tmp_name'])) 
		{
			// The Specifation of MIME Types That Are Valid
			// Geçerli Dosya Uzantılarının Belirlenmesi
			$valid_mime_types= 
			[
				'image/jpeg',
				'image/png',
				'image/gif'
			];

			// The Defination of Maximum Valid File Size
			// Geçerli Maksimum Dosya Boyutunun Tanımlanması
			$valid_file_size = (1024 * 1014 * 3); // 3 MB

			// The Defination of file's MIME type.
			// Yüklenen Dosyanın Uzantısının Tanımlanması
			$mime_type = $_FILES['file']['type'];

			// MIME Type Control
			// Geçerli dosya uzantısı tipi kontrolü
			if (in_array($mime_type, $valid_mime_types))
			{
				// File Size Control
				// Dosya boyutu kontrolü
				if($valid_file_size >= $_FILES['file']['size'])
				{
					// Everything is fine. So, let's upload the file.
					// Tüm şartlar sağlandı, öyleyse dosyayı yükleyelim.

					// The Process Of Uploading The File
					// Dosya yükleme işlemi

					$complete_uploading = move_uploaded_file($_FILES['file']['tmp_name'],
					'uploaded_files/new_name' );

					// Let's Control If File Uploading Process Was Completed or Not
					// Dosya yükleme işleminin tamamlanıp tamamlanmadığını kontrol edelim.
					if ($complete_uploading)
					{
						echo "Your file has been uploaded";
							echo "<br>";
						echo "<h1>Dosyanız yüklendi.</h1>"; 
							echo "<br>"; echo "<br>";
						// Let's open the file
						// Dosyayı gösterelim.
						echo "<img src='uploaded_files/new_name'> ";
					}
						else
						{
							echo "Your file couldn't be uploaded.";
								echo "<br>";
							echo "Dosyanız yüklenemedi.";
						}
				}
					else 
					{
						echo "The file's size you will upload cannot be bigger than 3 MB";
							echo "<br>";
						echo "Yükleyeceğiniz dosyanın boyutu 3 MB'tan daha büyük olamaz.";
					}
			}
				else
				{
					echo "ENG/ The file must be JPEG, PNG or GIF format.";
						echo "<br>";
					echo "TR/ Dosya sadece JPEG, PNG ya da GIF formatında olabilir.";
				}


		}
			else
			{
				echo "ENG/ Ooops, an error occurred while uploading the file";
					echo "<br>";
				echo "TR/ Dosya yüklenirken bir hata oluştu.";
			}
	}


}


?>

