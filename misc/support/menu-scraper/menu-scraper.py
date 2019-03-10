from lxml import html, etree
import requests
from collections import defaultdict
import json

# Get HTML source from menu page
page = requests.get('http://www.lioninn.co.uk/menu.html')
tree = html.fromstring(page.content)

# Get Menu Names and Aria's
menu_values = tree.xpath('//a[contains(@class,"nav-link")]/h4/text()')
menu_arias = tree.xpath('//a[contains(@class,"nav-link")]/@aria-controls')
# aria : name
menu_names = dict(zip(menu_arias, menu_values))

# Entire Menu
menu = defaultdict(lambda: defaultdict(lambda: defaultdict(list)))

# Create structure of menu --> sections --> items (item, subtitle, note) --> subitems
for aria, menu_name in menu_names.items():
    aria = str(aria)
    sections = tree.xpath('//div[@id="%s"]//h1/text()' % aria)
    # Create dict of menu : sections
    # menu[aria] = sections

    # Loop through sections
    for sec in sections:
        sec = str(sec)
        sec = sec.lower()
        sec = sec.replace(' ', '-')
        # Get items
        item_names = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//h3/text()' % (aria, sec))
        item_descs = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//p[not(@class)]/text()' % (aria, sec))
        item_prices = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]//p[contains(@class, "price")]/text()' % (aria, sec))

        print(len(item_names))
        print(len(item_descs))
        print(len(item_prices))

        items = []
        item = {}
        for i in range(max(len(item_names), len(item_descs), len(item_prices))):
            if i < len(item_names):
                item['name'] = item_names[i]
            if i < len(item_descs):
                item['desc'] = item_descs[i]
            if i < len(item_prices):
                item['price'] = item_prices[i]

            print(item)
            items.append(item)
            # item.clear()

        # print(items)

        # Create dict within above dict of menu : sections : items
        # menu[sec_class] = item_names

        # Loop through items
        for item in item_names:
            item = str(item)
            # Get subitems
            subitem_names = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]/div[contains(@class, "sub-item")]//p[not(@class)]/text()' % (aria, sec))      
            subitem_prices = tree.xpath('//div[@id="%s"]//div[contains(@class, "%s")]/div[contains(@class, "sub-item")]//p[contains(@class, "sub-price")]/text()' % (aria, sec))
            
            # print(len(subitem_names))
            # print(len(subitem_prices))

            subitems = []
            subitem = {}
            for j in range(max(len(subitem_names), len(subitem_prices))):
                if j < len(subitem_names):
                    subitem['name'] = subitem_names[j]
                if j < len(subitem_prices):
                    subitem['price'] = subitem_prices[j]

                print(subitem)
                subitems.append(subitem)

            # Create dict within above dict of menu : sections : items : subitems

# print(json.dumps(menu, indent=4))
