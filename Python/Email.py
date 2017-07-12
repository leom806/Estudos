# Send email with python 3.x

import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart
 
de = "leom806@gmail.com"
para = "leom806@gmail.com"
senha = ""
msg = MIMEMultipart()
msg['From'] = de
msg['To'] = para
msg['Subject'] = "Python Script"
 
corpo = "Email enviado por script em python 3.6 x64"
msg.attach(MIMEText(corpo, 'plain'))
 
server = smtplib.SMTP('smtp.gmail.com', 587)
server.starttls()
server.login(de, senha)
text = msg.as_string()
server.sendmail(de, para, text)
server.quit()