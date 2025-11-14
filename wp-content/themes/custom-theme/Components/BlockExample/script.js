/* globals fetch */
// Use these two funtions from helpers
import { buildRefs, getJSON } from '@/assets/scripts/helpers.js'
// You can import libraries like this one for example
// https://www.npmjs.com/package/just-validate
// just install it first with npm
import JustValidate from 'just-validate'

export default function (el) {
  // getJSON is used to get data from the Flynt/addComponentData on the php side
  const data = getJSON(el)
  // buildRefs is used to get elements from the DOM
  const refs = buildRefs(el)

  const validate = new JustValidate(refs.form)
  validate
    .onSuccess(() => {
      submitForm(refs, data)
    })
  refs.form.querySelectorAll('input, textarea').forEach(element => {
    const rules = []
    if (element.hasAttribute('required')) {
      rules.push({
        rule: 'required',
        errorMessage: data.errors.required
      })
    }
    if (element.type === 'email') {
      rules.push({
        rule: 'email',
        errorMessage: data.errors.email
      })
    }
    if (rules.length) validate.addField(element, rules)
  })

  refs.form.querySelectorAll('.input-group').forEach(element => {
    const fileInput = element.querySelector('input[type="file"]')
    const uploadText = element.querySelector('.upload-text')
    fileInput.addEventListener('change', (e) => {
      // Check if a file is selected
      if (e.target.files.length > 0) {
        // Set the file name as the upload text
        uploadText.textContent = e.target.files[0].name
      } else {
        // If no file is selected, show the original text
        uploadText.textContent = uploadText.getAttribute('data-label')
      }
    })
  })

  return () => {}
}

async function submitForm (refs, data) {
  const form = refs.form
  const formData = new FormData(form)
  formData.append('nonce', data.nonce)
  formData.append('action', 'contacts_form')
  form.classList.add('loading')

  try {
    const response = await fetch(data.ajax_url, {
      method: 'POST',
      body: formData
    })

    if (!response.ok) {
      throw new Error('Network response was not ok')
    }

    const responseText = await response.text()
    const responseObject = JSON.parse(responseText) // Parse the responseText into an object

    form.classList.remove('loading')

    if (responseObject.status === '000') {
      if (responseObject.redirect) {
        window.location.href = responseObject.redirect
      } else {
        form.classList.add('success')
        form.reset() // Clear the form fields
      }
    } else {
      if (responseObject.errors) {
        form.classList.remove('success')
        form.classList.add('error')
      }
    }
    console.log(responseText)
  } catch (error) {
    console.error('Request failed', error)
  }
}
