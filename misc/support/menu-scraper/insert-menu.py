import mysql.connector
import json
import datetime

# Insert Templates
insert_menu = '''INSERT INTO hjb01_lm_menu (name, rank, date_created, author) VALUES (%s, %s, %s, %s)'''
insert_section = '''INSERT INTO hjb01_lm_section (name, rank, date_created, author, side, parent_menu) VALUES (%s, %s, %s, %s, %s, %s)'''
insert_item = '''INSERT INTO hjb01_lm_item (name, rank, date_created, author, price, description, parent_section) VALUES (%s, %s, %s, %s, %s, %s, %s)'''
insert_subitem = '''INSERT INTO hjb01_lm_subitem (name, rank, date_created, author, price, parent_item) VALUES (%s, %s, %s, %s, %s, %s)'''
# Select Templates
select_parent_menu = "SELECT id FROM hjb01_lm_menu WHERE name = %s"

# Connect to MySQL Server & Database
menudb = mysql.connector.connect(
    host = "localhost",
    user = "root",
    passwd = "root",
    database = "lioninn"
)

# Open json file containing menu
menu = open('misc/support/menu-scraper/menu.json', 'r')
menu_json = json.load(menu)

# Create cursor
cur = menudb.cursor()

created = datetime.datetime.now()

for menu in menu_json:
    # print(type(menu))
    for mKey, mVal in menu.items():
        # If value is a string, it's a menu name
        if type(mVal) is str:
            menu_val = (mVal.capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1)
            cur.execute(insert_menu, menu_val)
            print(mVal.capitalize(), "inserted into menus.")
        # If it's a list of sections
        elif type(mVal) is list:
            for section in mVal:
                for sKey, sVal in section.items():
                    # If value is a string, it's a section name
                    if type(sVal) is str:
                        section_val = (sVal.capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1, 0, 18)
                        cur.execute(insert_section, section_val)
                        menudb.commit()
                        print(sVal.capitalize(), "inserted into sections.")
                    # If it's a list of items
                    elif type(sVal) is list:
                        for item in sVal:
                            item_val = (item.get('name').capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1, item.get('price'), item.get('desc'), 6)
                            print(item_val)
                            cur.execute(insert_item, item_val)
                            menudb.commit()
                            print(item.get('name').capitalize(), "inserted into items.")
                            # Subitems
                            for iKey, iVal in item.get('subitems').items():
                                for subitem in sVal:
                                    subitem_val = (subitem.get('name').capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1, subitem.get('price'), 1)
                                    cur.execute(insert_item, subitem_val)
                                    menudb.commit()
                                    print(subitem.get('name').capitalize(), "inserted into subitems.")
                    # Catch Error
                    else:
                        print("Error :- Not str or list.")
        # Catch Error
        else:
            print("Error :- Not str or list.")

# Commit changes
menudb.commit()

# Close cursor & database connection
cur.close()
menudb.close()

