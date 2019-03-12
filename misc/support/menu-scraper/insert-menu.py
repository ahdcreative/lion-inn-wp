import mysql.connector
import json

# Connect to MySQL Server & Database
menudb = mysql.connector.connect(
  host = "localhost",
  user = "root",
  passwd = "root",
  database = "lioninn"
)

# Open menu.json file
menu = open('misc/support/menu-scraper/menu.json', 'r')
menu_json = json.load(menu)

for menu in menu_json:
    print("\nMenu:")
    # print(type(menu))
    for sKey, sVal in menu.items():
        print(sKey + " : " + str(sVal))
        # for iKey, iVal in sVal.items():
        #     print(iKey + " : " + iVal)

# Create cursor
cur = menudb.cursor()

insert_template = '''
    INSERT INTO customers (name, address) 
    VALUES (%s, %s)
'''
# val = ("John", "Highway 21")

# cur.execute(sql, val)

# menudb.commit()

# print(cur.rowcount, "record inserted.")

# cur.close()
# db.close()



