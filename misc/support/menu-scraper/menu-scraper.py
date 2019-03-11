from lxml import html, etree
import requests
from collections import defaultdict
import json
import io

# Get HTML source from menu page
page = requests.get('http://www.lioninn.co.uk/menu.html')
tree = html.fromstring(page.content)

# Get Menu Names and Aria's
menu_values = tree.xpath('//a[contains(@class,"nav-link")]/h4/text()')
menu_arias = tree.xpath('//a[contains(@class,"nav-link")]/@aria-controls')
# aria : name
menu_names = dict(zip(menu_arias, menu_values))

# Entire Menu
# menu = defaultdict(lambda: defaultdict(lambda: defaultdict(list)))

# Create structure of menu --> sections --> items (item, subtitle, note)
menus = []
menu = {}
for aria, menu_name in menu_names.items():
    aria = str(aria)
    menu['name'] = aria
    section_names = tree.xpath('//div[@id="%s"]//h1/text()' % aria)

    # Loop through sections
    sections = []
    section = {}
    for sec in section_names:
        sec = str(sec)
        sec = sec.lower()
        sec = sec.replace(' ', '-')
        section['name'] = sec
        # Get items
        if(sec == 'sides'):
            item_names = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//h3/text()' % (aria, sec))
            item_descs = [' '] * 20
            item_prices = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//div[not(contains(@class, "text-md-right"))]/p[contains(@class, "price")]/text()' % (aria, sec))
        else:
            item_names = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//h3/text()' % (aria, sec))
            item_descs = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//p[not(@class)]/text()' % (aria, sec))
            item_prices = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//p[contains(@class, "price")]/text()' % (aria, sec))

        # Create list of items in given section
        items = []
        item = {}
        for i in range(min(len(item_names), len(item_descs), len(item_prices))):
            if i < len(item_names):
                item['name'] = item_names[i]
            if i < len(item_descs):
                item['desc'] = item_descs[i]
            if i < len(item_prices):
                item['price'] = item_prices[i].strip('\u00a3')

            items.append(item)
            item = {}

        # Append items to section
        section['items'] = items
        sections.append(section)
        section = {}
    
    # Append sections to menu
    menu['sections'] = sections
    menus.append(menu)
    menu = {}

# Print to console
# print(json.dumps(menus, indent=4))

# Export to JSON file
# with open('menu_json.json', 'w') as of:
#     json.dump(menus, of)

of = open('menu.txt', 'w')
of.write("test")
of.close()

# {
#     "name": "Bacon",
#     "price": "+60p"
# }