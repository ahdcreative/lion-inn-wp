from lxml import html, etree
import requests

# Get HTML source from menu page
page = requests.get('http://www.lioninn.co.uk/menu.html')
tree = html.fromstring(page.content)

# Get Menu's
menu_values = tree.xpath('//a[contains(@class,"nav-link")]/h4/text()')
menu_arias = tree.xpath('//a[contains(@class,"nav-link")]/@aria-controls')

# Match menu names up with their aria labels
menus = dict(zip(menu_arias, menu_values))

# Create structure of menu --> sections --> items (item, subtitle, note) --> subitems
for aria, menu in menus.items():
    sections = tree.xpath('//div[@id="%s"]//h1/text()' % aria)
    

