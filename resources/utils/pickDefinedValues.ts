export function pickDefinedValues<T extends object>(
  object: T | Ref<T>
): Partial<T> {
  return Object.entries(unref(object)).reduce((previousValue, [key, value]) => {
    if (value) previousValue = Object.assign(previousValue, { [key]: value })
    return previousValue
  }, {} as Partial<T>)
}
