#!/usr/bin/env python
# -*- coding: UTF-8 -*-
from flask import Flask,make_response, request
from redis import Redis
import dbManager as db
from pprint import pprint
import json
import random

app = Flask(__name__)
app.config['JSON_AS_ASCII'] = False
redis = Redis(host='redis', port=6379)


@app.route('/')
def hello():
    redis.incr('hits')
    return 'this is Amix3rd Edition ackground APIs server!<br>'

# 指定されたものの問題量を返す
@app.route('/user/set/', methods=['POST'])
def get_size():

    userName = request.form['username']
    passHash = request.form['passHash']
    res = db.userSet(userName, passHash)
    returnDic = {"status": "200", "main": res}
    response = make_response(str(json.dumps(returnDic)))
    response.headers['Access-Control-Allow-Origin'] = '*'
    return response

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=80, debug=True)
