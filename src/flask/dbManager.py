import pymysql.cursors


# MySQLに接続する
# MySQLに接続する
def runQuery(sql, args=None):
    print(str(sql))
    try:
        connect =  pymysql.connect(host='db',
                                 user='ymic',
                                 passwd='ymic',
                                 db='ymic',
                                 charset='utf8',
                                 cursorclass=pymysql.cursors.DictCursor)

        connect.autocommit(True)
        connect = connect.cursor()
        if args == None:
            connect.execute(sql)
        else:
            connect.execute(sql, args)

        result = connect.fetchall()
        rows = connect.rowcount
        connect.close()
        if(rows != 0):
            return result
        else:
            connect.close()
            return True
    except Exception as e:
        return False

def getTest():
    cur = makeConnect()
    cur.execute("SELECT * FROM questions limit 1")
    conn.close()

    # Select結果を取り出す
    # results = cur.fetchall()
    for row in cur.fetchall():
        return("{}:{}".format(row["id"], row["text"]))


    return results

def getSourceList():
    resultArray = []
    result = runQuery("SELECT DISTINCT sourceNo  FROM question.questions ORDER BY sourceNo")
    for row in result:
        resultArray.append(row["sourceNo"])

    return  resultArray

def userSet(userName, passHash):
    result = runQuery("INSERT INTO `ymic`.`user` (`userName`, `passwd`) VALUES (%s,  %s);", (userName, passHash))
    return result
