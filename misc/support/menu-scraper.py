from lxml import html, etree
import requests

page = requests.get('http://www.lioninn.co.uk/menu.html')
tree = html.fromstring(page.content)

print(etree.tostring(tree, pretty_print=True))

