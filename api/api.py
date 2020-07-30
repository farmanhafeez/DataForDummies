import requests
import flask
from flask import request, jsonify

app = flask.Flask(__name__)
app.config["DEBUG"] = True


@app.route('/', methods=['GET'])
def home():
    if 'data' in request.args:
        data = request.args['data']
        URL = "http://localhost/DataForDummies/api/"+data+"/?result=5"
        r = requests.get(url=URL)
        json = r.json()
        return jsonify(json)


app.run()
