# Google Cloud Vision API

require "google/cloud/vision"

project_id = "model-marker-168819"

vision = Google::Cloud::Vision.new project: project_id 

file_name = "C:\\Users\\leomo\\Pictures\\Wallpapers\\viado.png"

#labels = vision.image(file_name).labels

#puts "Labels: "
#labels.each do |label|
#	puts label.description
#end

# image_path = "Google Cloud Storage URI, eg. 'gs://my-bucket/image.png'"
image  = vision.image file_name

puts image.text