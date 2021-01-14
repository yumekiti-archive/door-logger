import pprint
import requests
import json

response = requests.post(
        'http://127.0.0.1:5000/post',
        {'foo':'bar'})
    #レスポンスオブジェクトのjsonメソッドを使うと、
    #JSONデータをPythonの辞書オブジェクトに変換して取得できる
pprint.pprint(response.json())
