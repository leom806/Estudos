require 'csv'

if ARGV.first.to_s=="" then exit(0) end

CSV.foreach(ARGV.first.to_s) do |row|
	puts row.inspect
end