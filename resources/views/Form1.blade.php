<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Application Form</title>
    <link rel="stylesheet" href="{{ asset('asset/css/Form1.css')}}" />
       
 
</head>

    
    @include('navbar2')
    <div class="main-container">
        <div class="left-section">
            <div class="form-container">
                <form id="visaForm" action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Person 1 Container -->
                    <div class="person-container" id="person-1">
                        <button type="button" class="remove-person" style="display: none;">Remove Person</button>
                        <div class="person-title">Person 1</div>
                        
                        <!-- Personal Information Section -->
                        <div class="form-section">
                            <h2>Personal Information</h2>
                            <div class="form-row">
                                <!-- First Name -->
                                <div class="input-group">
                                    <label>First Name</label>
                                    <div class="bilingual-input">
                                        <div class="input-group">
                                            <input type="text" placeholder="English" id="fullNameOutput" name="first_name" required>
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Middle Name -->
                                <div class="input-group">
                                    <label>Middle Name</label>
                                    <div class="bilingual-input">
                                        <div class="input-group">
                                            <input type="text" placeholder="English" name="middle_name">
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="input-group">
                                    <label>Last Name</label>
                                    <div class="bilingual-input">
                                        <div class="input-group">
                                            <input type="text" placeholder="English" name="last_name" required>
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Other Personal Info -->
                            <div class="form-row">
                                <div class="input-group">
                                    <label>Nationality</label>
                                    <select name="nationality" required>
                                        <option value="">Select Country</option>
                                        <option>India</option>
                                        <option>UAE</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label>Passport Number</label>
                                    <input type="text" id="passportOutput" 
                                    pattern="[A-Za-z0-9]+" name="passport_number" required>
                                    
                                </div>
                                <div class="input-group">
                                    <label>Birth Date</label>
                                    <input type="date" placeholder="DD/MM/YYYY" name="birth_date" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group">
                                    <label>Gender</label>
                                    <select name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>                                        
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label>Marital Status</label>
                                    <select name="marital_status" required>
                                        <option value="">Select Status</option>
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Divorced</option>
                                        <option>Widowed</option>
                                        <option>Separated</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group">
                                    <label>Passport Issue Date</label>
                                    <input type="text" id="issueDateOutput" name="passport_issue_date" required>
                                </div>
                                <div class="input-group">
                                    <label>Passport Expiry Date</label>
                                    <input type="text" id="expiryDateOutput" name="passport_expiry_date" required>
                                </div>
                                <div class="input-group">
                                    <label>PAN Card Number</label>
                                    <input type="text" id="panOutput" name="pan_card_number">
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="form-section">
                            <h2>Address Information</h2>
                            <div class="form-row">
                                <div class="input-group">
                                    <label>Address</label>
                                    <input type="text" id="addressOutput" name="address" required>
                                </div>
                                <div class="input-group">
                                    <label for="phone_number">Phone Number</label>
                                     <input type="text" id="phone_number" name="phone_number" maxlength="10" pattern="\d{10}" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                    </div>

                            </div>

                            <div class="form-row">
                                <div class="input-group">
                                    <label>Landmark</label>
                                    <div class="bilingual-input">
                                        <div class="input-group">
                                            <input type="text" placeholder="English" name="landmark">
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group">
                                    <label>Country</label>
                                    <select name="country" required>
                                        <option value="">Select Country</option>
                                        <option>India</option>
                                        <option>UAE</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label>State</label>
                                    <div class="bilingual-input">
                                        <div class="input-group">
                                            <input type="text" placeholder="English" name="state" required>
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group">
                                    <label>City</label>
                                    <div class="bilingual-input">
                                        <div class="input-group">
                                            <input type="text" placeholder="English" name="city" required>
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <label>Pincode</label>
                                    <div class="bilingual-input">
                                    <input type="number" id="pincode" name="pincode" maxlength="6" pattern="\d{6}" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">

                                        <!-- <div class="input-group">
                                            <input type="number" placeholder="English" name='pincode' required>
                                            <span class="lang-label">EN</span>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" placeholder="العربية">
                                            <span class="lang-label">AR</span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions" >
                        <button type="submit" class="add-person">+ ADD new person</button>
                        <button type="submit" class="submit-button" >Submit</button>
                        <!-- <a href="TotalBill" class="next-page">Next Page</a> -->
                        <!-- <button type="submit" class="submit">Submit</button> -->
                    </div>
                
            </div>
        </div>
        <div class="right-section">
            <!-- Person 1 Uploads -->
            <div class="person-uploads-right" data-person="1">
                <h3>Person 1 Documents</h3>
                <div class="upload-container">
                    <label class="upload-box">
                    <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Image" class="preview-img">
                        <p>Upload First Page of Passport</p>
                        <span class="file-name">Drag and drop image</span>
                        <input type="file" accept="image/*"name='passport_first_page' id="firstPageUpload" class="file-input" hidden required>
                    </label>
                   
                </div>

                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload last page of passport</p>
                        <span class="file-name">Drag and drop image</span>
                        <input type="file" accept="image/*" name='passport_last_page' id="lastPageUpload" class="file-input" hidden required>
                    </label>
                    
                </div>

                <div class="upload-container">
                    <label class="upload-box">
                    <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload traveller photograph</p>
                        <span class="file-name">Drag and drop image</span>
                        <input type="file" accept="image/*" name='photo' id="photo" class="file-input" hidden required>
                    </label>
                  
                </div>
                <div class="upload-container">
                    <label class="upload-box">
                    <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                    <p>Upload pan card photo</p>
                    <span class="file-name">Drag and drop image</span>
                    <input type="file" accept="image/*" name='pan_card' id="panCardUpload" class="file-input" hidden>
                </label>
                
                </div>
                <div class="upload-container">
                    <label class="upload-box">
                    <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                    <p>Upload return ticket</p>
                    <span class="file-name">Drag and drop image</span>
                    <input type="file" accept="image/*" name='return_ticket' id="returnTicketUpload" class="file-input" hidden>
                </label>
                
                </div>

                
                <div class="upload-container">
                <label class="upload-box">
                <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                    <p>Upload hotel booking details</p>
                    <span class="file-name">Drag and drop image</span>
                    <input type="file" accept="image/*" name='hotel_details' id="hotelDetailsUpload" class="file-input" hidden>
                </label>
               
                </div>
                </div>  
                </form>            
             </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4/dist/tesseract.min.js"></script>
    <script>
   let passportNumber = ''; // Store passport number globally

document.getElementById('firstPageUpload').addEventListener('change', function (event) {
    processImage(event.target.files[0], 'firstPage');
});

document.getElementById('lastPageUpload').addEventListener('change', function (event) {
    processImage(event.target.files[0], 'lastPage');
});

document.getElementById('panCardUpload').addEventListener('change', function (event) {
    processImage(event.target.files[0], 'panCard');
});

function processImage(file, type) {
    if (file) {
        Tesseract.recognize(file, 'eng', {  // Extracting only English text
            logger: (info) => console.log(info),
        }).then(({ data: { text } }) => {
            console.log("Extracted Text:", text); // Debugging Output

            const extractedData = extractDetails(text, type);

            if (type === 'firstPage') {
                passportNumber = extractedData.passportNumber || ''; // Store passport number globally
                document.getElementById('passportOutput').value = passportNumber || 'Not Found';
                document.getElementById('issueDateOutput').value = extractedData.issueDate || 'Not Found';
                document.getElementById('expiryDateOutput').value = extractedData.expiryDate || 'Not Found';
                document.getElementById('fullNameOutput').value = extractedData.fullName || 'Not Found'; // Populate full name
            } else if (type === 'lastPage') {
                if (!passportNumber) { // If passport number wasn't found in the first page
                    passportNumber = extractedData.passportNumber || '';
                    document.getElementById('passportOutput').value = passportNumber || 'Not Found';
                }
                document.getElementById('addressOutput').value = extractedData.address || 'Not Found';
            } else if (type === 'panCard') {
                document.getElementById('panOutput').value = extractedData.panNumber || 'Not Found';
            }
        }).catch((error) => {
            console.error('Error:', error);
        });
    }
}

function extractDetails(text, type) {
    let passportNumber = '', issueDate = '', expiryDate = '', address = '', panNumber = '', fullName = '';

    const lines = text.split('\n').map(line => line.trim()).filter(line => line);

    // Regular Expressions for Extraction
    const passportRegex = /\b[A-Z]\d{7,8}\b/; // Passport Number (e.g., A12345678)
    const dateRegex = /\b(\d{2}[-\/]\d{2}[-\/]\d{4})\b/; // Date format: DD/MM/YYYY or DD-MM-YYYY
    const addressRegex = /(Street|Road|Avenue|Lane|City|Town|State).*$/i; // Address pattern
    const panRegex = /\b[A-Z]{5}[0-9]{4}[A-Z]{1}\b/; // PAN Card format (ABCDE1234F)
    const nameRegex = /^[A-Z\s]+$/; // Name format (uppercase letters and spaces)

    for (let i = 0; i < lines.length; i++) {
        // Extract Passport Number (Checking for "Passport No" keyword)
        if (!passportNumber && /Passport No|Passport Number/i.test(lines[i])) {
            let nextLine = lines[i + 1] || '';
            if (passportRegex.test(nextLine)) {
                passportNumber = nextLine.match(passportRegex)[0];
            }
        }
        
        // Extract Date of Issue
        if (type === 'firstPage' && !issueDate && /DateofIssue|Date of Issue/i.test(lines[i])) {
            let match = lines[i].match(dateRegex);
            if (match) issueDate = match[1];
        }

        // Extract Date of Expiry
        if (type === 'firstPage' && !expiryDate && /DateofExpiry|Date of Expiry/i.test(lines[i])) {
            let match = lines[i].match(dateRegex);
            if (match) expiryDate = match[1];
        }
        
        // Extract Address (Last Page)
        if (type === 'lastPage' && !address && addressRegex.test(lines[i])) {
            address = lines[i];
        }

        // Extract PAN Number
        if (type === 'panCard' && !panNumber && panRegex.test(lines[i])) {
            panNumber = lines[i].match(panRegex)[0];
        }

        // Extract Full Name (First Page of Passport)
        if (type === 'firstPage' && !fullName && /Given Name|Surname/i.test(lines[i])) {
            // Assuming the name is on the next line
            if (i + 1 < lines.length) {
                const givenName = lines[i-1].trim();
                const surname = lines[i+1]?.trim() || ''; // Surname is optional
                fullName = `${givenName} ${surname}`.trim();
            }
        }
        if (type === 'firstPage' && !issueDate && /Date of Issue|DOI/i.test(lines[i])) {
        // Assuming the date is on the next line
         if (i + 1 < lines.length) {
             const dateLine = lines[i + 1].trim();
             const match = dateLine.match(/\b(\d{2}[-\/]\d{2}[-\/]\d{4})\b/); // Match date format
         if (match) {
            issueDate = match[1]; // Extract the date
    }
 }
}

        if (type === 'firstPage' && !expiryDate && /Date of Expiry|DOE/i.test(lines[i])) {
         // Assuming the date is on the next line
         if (i + 1 < lines.length) {
          const dateLine = lines[i + 1].trim();
          const match = dateLine.match(/\b(\d{2}[-\/]\d{2}[-\/]\d{4})\b/); // Match date format
          if (match) {
             expiryDate = match[1]; // Extract the date
      }
}
}
    }

    return { passportNumber, issueDate, expiryDate, address, panNumber, fullName };
}
    document.addEventListener('DOMContentLoaded', function() {
        const maxPersons = 4;
        let personCount = 1;
        const form = document.getElementById('visaForm');
        const rightSection = document.querySelector('.right-section');
        
        // Add Person functionality
        document.querySelector('.add-person').addEventListener('click', function() {
            if (personCount >= maxPersons) {
                alert(`Maximum of ${maxPersons} persons allowed`);
                return;
            }
            
            personCount++;
            const personId = personCount;
            
            // Clone the first person container
            const originalPerson = document.querySelector('.person-container');
            const newPerson = originalPerson.cloneNode(true);
            
            // Update person details
            newPerson.id = `person-${personId}`;
            newPerson.querySelector('.person-title').textContent = `Person ${personId}`;
            
            // Show remove button for cloned persons
            newPerson.querySelector('.remove-person').style.display = 'block';
            newPerson.querySelector('.remove-person').addEventListener('click', function() {
                if (confirm('Are you sure you want to remove this person?')) {
                    newPerson.remove();
                    document.querySelector(`.person-uploads-right[data-person="${personId}"]`).remove();
                    personCount--;
                    updatePersonNumbers();
                }
            });
            
            // Clear all input values in the new person section
            newPerson.querySelectorAll('input').forEach(input => {
                if (input.type !== 'file') {
                    input.value = '';
                    input.classList.remove('error');
                }
            });
            newPerson.querySelectorAll('select').forEach(select => {
                select.selectedIndex = 0;
                select.classList.remove('error');
            });
            
            // Insert the new person before the form actions
            const formActions = document.querySelector('.form-actions');
            form.insertBefore(newPerson, formActions);
            
            // Create corresponding upload section in right panel
            createUploadSection(personId);
        });
        
        // Function to create upload section for a person
        function createUploadSection(personId) {
            const uploadSection = document.createElement('div');
            uploadSection.className = 'person-uploads-right';
            uploadSection.dataset.person = personId;
            
            uploadSection.innerHTML = `
                <h3>Person ${personId} Documents</h3>
                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload first page of passport</p>
                        <input type="file" accept="image/*" id="firstPageUpload" class="file-input" hidden required>
                        <span class="file-name">Drag and drop image</span>
                        
                    </label>
                    
                </div>

                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload last page of passport</p>
                        <input type="file" accept="image/*" id="lastPageUpload" class="file-input" hidden required>
                        <span class="file-name">Drag and drop image</span>
                        
                    </label>
                    
                </div>

                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload traveller photograph</p>
                         <input type="file" accept="image/*" class="file-input" hidden required>
                        <span class="file-name">Drag and drop image</span>
                       
                    </label>
                    
                </div>
                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload pan card photo</p>
                        <input type="file" accept="image/*" id="panCardUpload"  class="file-input" hidden required>
                        <span class="file-name">Drag and drop image</span>
                        
                    </label>
                    
                </div>

                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload return ticket</p>
                        <input type="file" accept="image/*"  class="file-input" hidden required>
                        <span class="file-name">Drag and drop image</span>
                        
                    </label>
                   
                </div>

                <div class="upload-container">
                    <label class="upload-box">
                        <img src="{{url('asset/css/Images/uploadicon.png')}}" alt="Upload Icon" class="preview-img">
                        <p>Upload hotel booking details</p>
                        <input type="file" accept="image/*" class="file-input" hidden required>
                        <span class="file-name">Drag and drop image</span>
                        
                    </label>
                    
                </div>    
            `;
            
            // Find all person upload sections
            const personUploadSections = rightSection.querySelectorAll('.person-uploads-right');
            
            if (personUploadSections.length > 0) {
                // Insert after the last person upload section
                const lastPersonSection = personUploadSections[personUploadSections.length - 1];
                rightSection.insertBefore(uploadSection, lastPersonSection.nextSibling);
            } else {
                // Insert before the additional documents if no person sections exist
                const additionalDocs = rightSection.querySelector('.upload-container');
                if (additionalDocs) {
                    rightSection.insertBefore(uploadSection, additionalDocs);
                } else {
                    rightSection.appendChild(uploadSection);
                }
            }
            
            // Initialize file uploads for the new section
            initFileUploads(uploadSection);
        }
        
        // Function to update person numbers when someone is removed
        function updatePersonNumbers() {
            const persons = document.querySelectorAll('.person-container');
            persons.forEach((person, index) => {
                const personNumber = index + 1;
                person.id = `person-${personNumber}`;
                person.querySelector('.person-title').textContent = `Person ${personNumber}`;
                
                // Update corresponding upload section
                const uploadSection = document.querySelector(`.person-uploads-right[data-person="${personNumber}"]`);
                if (uploadSection) {
                    uploadSection.dataset.person = personNumber;
                    uploadSection.querySelector('h3').textContent = `Person ${personNumber} Documents`;
                }
            });
        }
        
        // Function to initialize file uploads for a container
        function initFileUploads(container) {
            const uploadBoxes = container.querySelectorAll('.upload-box');
            if (uploadBoxes.length === 0) return;  // Exit early if no upload boxes

            uploadBoxes.forEach(box => {
                const fileInput = box.querySelector('.file-input');
                const fileName = box.querySelector('.file-name');
                const previewImg = box.querySelector('.preview-img');

                if (!fileInput || !fileName || !previewImg) return;  // Check if essential elements exist

                box.addEventListener('click', () => fileInput.click());

                box.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    box.style.backgroundColor = '#e9f5ff';
                });

                box.addEventListener('dragleave', () => {
                    box.style.backgroundColor = '';
                });

                box.addEventListener('drop', (e) => {
                    e.preventDefault();
                    box.style.backgroundColor = '';
                    if (e.dataTransfer.files.length) {
                        fileInput.files = e.dataTransfer.files;
                        updateFileDisplay();
                    }
                });

                fileInput.addEventListener('change', updateFileDisplay);

                function updateFileDisplay() {
                    if (fileInput.files.length > 0) {
                        const file = fileInput.files[0];
                        fileName.textContent = file.name;

                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                previewImg.src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    } else {
                        fileName.textContent = 'No file selected';
                        previewImg.src = "{{url('asset/css/Images/uploadicon.png')}}";
                    }
                }
            });
        }
        
        // Initialize file uploads for all existing sections
        document.querySelectorAll('.person-uploads-right').forEach(section => {
            initFileUploads(section);
        });
        
        // Initialize file uploads for additional documents
        document.querySelectorAll('.right-section .upload-container').forEach(uploadSection => {
            initFileUploads(uploadSection);
        });
        
        // Form validation before proceeding to TotalBill
        document.querySelector('.next-page').addEventListener('click', function(e) {
            e.preventDefault();
            
            let isValid = true;
            
            // Validate all form sections for each person
            document.querySelectorAll('.person-container').forEach(person => {
                person.querySelectorAll('[required]').forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('error');
                        isValid = false;
                    } else {
                        field.classList.remove('error');
                    }
                });
            });
            
            // Validate file uploads for each person
            document.querySelectorAll('.person-uploads-right').forEach(section => {
                section.querySelectorAll('.file-input[required]').forEach(fileInput => {
                    if (!fileInput.files || fileInput.files.length === 0) {
                        fileInput.closest('.upload-container').style.border = '2px solid red';
                        isValid = false;
                    } else {
                        fileInput.closest('.upload-container').style.border = '';
                    }
                });
            });
            
            if (isValid) {
                window.location.href = this.getAttribute('href');
            } else {    
                alert('Please fill all required fields and upload all required documents for each person');
            }
            
        });
        
    });
    
</script>

</body>
</html> 