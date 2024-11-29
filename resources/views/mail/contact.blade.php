<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('site.name') }} Services</title>
		@vite('resources/css/app.css')
    <style>
        /* Reset styles */

        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
     
    </style>
</head>
<!-- Complete Email template -->

<body style="background-color:#f3f3f3"> 
	<table align="center" border="0" cellpadding="0" cellspacing="0"
		width="550" bgcolor="white" style=" margin-top: 80px;"> 
		<tbody> 
			<tr> 
				<td align="center"> 
					<table align="center" border="0" cellpadding="0"
						cellspacing="0" class="col-550" width="550"> 
						<tbody> 
							<tr> 
								<td align="center" style="background-color: var(--primary); 
										height: 100px;"> 

									<a href="#" style="text-decoration: none;"> 
										<p style="color:white; 
												font-weight:bold"> 
												{{ config('site.name') }} Service
										</p> 
									</a> 
								</td> 
							</tr> 
						</tbody> 
					</table> 
				</td> 
			</tr> 
			<tr style="height: 3px;"> 
				<td align="left" style="border: none;  
						padding-right: 20px;padding-left:20px"> 

					<p style="font-weight: bold;font-size: 22px; 
							letter-spacing: 0.025em; 
							color:black;"> 
						Message from
						<br> {{ $email }} 
					</p> 
				</td> 
			</tr> 

			<tr style="display: inline-block;"> 
				<td style=" 
						padding: 20px; 
						border: none; 
						border-bottom: 2px solid #361B0E; 
						background-color: white;"> 
					
					<p style="text-align: left; 
							align-items: center;"> 
						{{ $content }}
					</p> 
					 
				</td> 
			</tr> 
		</tbody> 
	</table> 
</body> 
 
</html>
