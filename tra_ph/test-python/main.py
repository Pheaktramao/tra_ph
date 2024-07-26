text = ["Apple", "Banana", "Orange"]
result = []
for string in text:
    reversed_item = string[::-1]
    result.append(reversed_item)
result.reverse()
print (result)