# Create a subscription

    POST /subscribe/{topic}

Expected Body

    {
    	url: string
    }

# Publish message to topic

    POST /publish//{topic}

Expected Body

    {
    	[key: string]: any
    }
