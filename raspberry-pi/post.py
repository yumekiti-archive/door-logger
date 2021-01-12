import requests

url = 'http://localhost:50007'

test1 = {
    "color1": "sda"
}

response = requests.post(url, test1)
print(response.text)
