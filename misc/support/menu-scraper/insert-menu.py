import mysql.connector
import json
import datetime

# Insert Templates
insert_menu = '''INSERT INTO hjb01_lm_menu (id, name, rank, date_created, author) VALUES (%s, %s, %s, %s, %s)'''
insert_section = '''INSERT INTO hjb01_lm_section (id, name, rank, date_created, author, side, parent_menu) VALUES (%s, %s, %s, %s, %s, %s, %s)'''
insert_item = '''INSERT INTO hjb01_lm_item (id, name, rank, date_created, author, price, description, parent_section) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)'''
insert_subitem = '''INSERT INTO hjb01_lm_subitem (id, name, rank, date_created, author, price, parent_item) VALUES (%s, %s, %s, %s, %s, %s, %s)'''
# Select Templates
select_parent_menu = "SELECT id FROM hjb01_lm_menu WHERE name = (%s)"

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
cur = menudb.cursor(buffered=True)

created = datetime.datetime.now()

menu_id = 1
section_id = 1 
item_id = 1
subitem_id = 1

# Insert menu into database
for menu in menu_json:
    menu_val = (menu_id, menu.get('name').capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1)
    cur.execute(insert_menu, menu_val)
    menudb.commit()
    print(menu.get('name').capitalize(), "inserted into menus.")
    if menu.get('sections'):
        for section in menu.get('sections'):
            section_val = (section_id, section.get('name').capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1, 0, menu_id)
            cur.execute(insert_section, section_val)
            menudb.commit()
            print(section.get('name').capitalize(), "inserted into sections.")
            if section.get('items'):
                for item in section.get('items'):
                    price = "0.00" if item.get('price') == "" else item.get('price')
                    item_val = (item_id, item.get('name').capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1, price, item.get('desc'), section_id)
                    cur.execute(insert_item, item_val)
                    menudb.commit()
                    print(item.get('name').capitalize(), "inserted into items.")
                    if item.get('subitems'):
                        for subitem in item.get('subitems'):
                            subitem_val = (subitem_id, subitem.get('name').capitalize(), 0, created.strftime("%Y-%m-%d %H:%M:%S"), 1, subitem.get('price'), item_id)
                            cur.execute(insert_subitem, subitem_val)
                            menudb.commit()
                            print(subitem.get('name').capitalize(), "inserted into subitems.")
                            subitem_id += 1
                    item_id += 1
            section_id += 1
    menu_id += 1

# Commit changes
menudb.commit()

# Close cursor & database connection
cur.close()
menudb.close()

